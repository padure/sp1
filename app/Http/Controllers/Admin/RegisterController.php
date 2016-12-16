<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin;
use Carbon\Carbon;
use Hash;
use Mail;
use Crypt;

class RegisterController extends Controller
{
    public function login(Request $request){
        $email=strtolower($request->email);
        $parola=$request->password;
        $admin=DB::table('admin')
                ->where('email', $email)
                ->where('confirmed',1)
                ->where('accepted',1)
                ->first();
        if(!empty($admin))
        {
            if (Hash::check($parola, $admin->password)){
                session(["idAdmin"=>$admin->id,
                        "nameAdmin"=>$admin->name,
                        "emailAdmin"=>$admin->email,
                       ]);
                return redirect("/admin");
                
            }else{
                 return view('admin.partials.login',['error' => true]);
            }
        }else{
            return view('admin.partials.login',['error' => true]);
        }
    }
    public function register(Request $request){
        $rules =[
            'name' => 'required|min:6|max:25',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:6',
            'rpassword' => 'required|same:password'
        ];
        $this->validate($request,$rules);
        $token=str_random(32);
        DB::table('admin')->insert([
            'name' => strtolower($request->name), 
            'email' => strtolower($request->email),
            'password' => bcrypt(strtolower($request->password)),
            'token' => $token,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        $email=strtolower($request->email);
        Mail::send('admin.emails.comfirm', ['email' => Crypt::encrypt($email) , 'token' => $token], function ($m) use ($email) {
            $m->to($email)->subject('Cod comfirmare email');
        });
        return view('admin.tanks.emailsend'); 
    }
    public function comfirm($email,$token){
        $email=Crypt::decrypt($email);
        $confirmation=DB::table('admin')
                ->where('email',$email)
                ->where('token',$token)
                ->first();
        if($confirmation){
            $first=DB::table('admin')->where('confirmed',1)->count();
            DB::table('admin')
                    ->where('email',$email)
                    ->update(['confirmed' => 1 , 'token' =>null]);
            if($first==0){
                DB::table('admin')
                    ->where('email',$email)
                    ->update(['accepted' => 1]);
                $admin=DB::table('admin')
                        ->where('email', $email)
                        ->where('confirmed',1)
                        ->where('accepted',1)
                        ->first();
                session(["idAdmin"=>$admin->id,
                        "nameAdmin"=>$admin->name,
                        "emailAdmin"=>$admin->email,
                       ]);
                return redirect('/admin');
            }
            return view("admin.tanks.emailconfirmed",["succes"=>true]);
        }else{
            return view("admin.tanks.emailconfirmed",["succes"=>false]);
        } 
    }
    public function exitadmin(){
        session()->forget('idAdmin');
        session()->forget('emailAdmin');
        session()->forget('nameAdmin');
        return redirect("/admin");
    }
}
