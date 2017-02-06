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
            'name' => $request->name, 
            'email' => strtolower($request->email),
            'password' => bcrypt(strtolower($request->password)),
            'token' => $token,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        $email=strtolower($request->email);
        Mail::send('admin.emails.comfirm', ['email' => Crypt::encrypt($email) , 'token' => $token], function ($m) use ($email) {
            $m->to($email)->subject('Comfirmare email');
        });
        return view('admin.tanks.emailsend'); 
    }
    public function sendemail(Request $request){
        $email=$request->email;
        $exist=DB::table("admin")->where("email",$email)->first();
        if(!empty($exist) && count($exist) >0){
            $token=str_random(5);
            DB::table('admin')->where("email",$email)->update([
                'token' => $token,
                ]);
            Mail::send('admin.emails.reset', ['token' => $token], function ($m) use ($email) {
                $m->to($email)->subject('Resetare parola');
            });
            return view("admin.partials.reset",["corect"=>$email]);
        }
        else{
            return view("admin.partials.reset",["error"=>"eroare"]);
        }
    }
    public function setcode(Request $request){
        $email=$request->email;
        $code=$request->code;
        $exist=DB::table("admin")->where("email",$email)->value("token");
        
        if(strcmp($code,$exist)==0){
            return view("admin.partials.reset",["newpass"=>$email,"corect"=>true]);
        }
        else{
            return view("admin.partials.reset",["corect"=>$email,"codeeror"=>"eror"]);
        }
    }
    public function newpass(Request $request){
        $email=$request->email;
        $newpass=$request->newpass;
        if(strlen($newpass)>5 && strlen($newpass)<50){
            DB::table("admin")->where("email",$email)->update([
                'token' => null,
                'password'=>bcrypt(strtolower($newpass)),
                ]);
            return redirect("/admin");
        }
        else{
            return view("admin.partials.reset",["newpass"=>$email,"corect"=>true,"newpasseror"=>"eror"]);
        }
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
                $admin=DB::table('admin')
                        ->where('email', $email)
                        ->where('confirmed',1)
                        ->first();
                session(["idAdmin"=>$admin->id,
                        "nameAdmin"=>$admin->name,
                        "emailAdmin"=>$admin->email,
                       ]);
                return redirect('/admin');
            }else{
                return redirect('/admin/login');
            }
            return view("admin.tanks.emailconfirmed",["succes"=>true]);
        }else{
            return view("admin.tanks.emailconfirmed",["succes"=>false]);
        } 
    }
    public function registerother(Request $request , Admin $admin){
        $permision=DB::table("admin")->min("id");
        $session=session("idAdmin");
        if($permision!=$session){
            return response()->json(false);
        }
        $register["logat"]=false; $inscrie=true;
        $register["name"]=""; $register["email"]=""; $register["password"]="";
        if(strlen($request->name)<6 || strlen($request->name)>25)
        {
            $register["name"]="Nume 6-25 charactere";
            $inscrie=false;
        }
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            if ($admin->getEmail($request->email)){
                $register["email"]="Email ocupat"; 
                $inscrie=false;
            }
        }else{
            $register["email"]="Introduceti un email*"; 
            $inscrie=false;
        }
        if (strlen($request->password)<6 || strlen($request->password)>50){
            $register["password"]="Parola 5-50 charactere";
            $inscrie=false;
        }
        if($inscrie==true){
            $register["logat"]=true;
            $token=str_random(32);
            DB::table('admin')->insert([
                'name' => $request->name, 
                'email' => strtolower($request->email),
                'password' => bcrypt(strtolower($request->password)),
                'token' => $token,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            $email=strtolower($request->email);
            Mail::send('admin.emails.comfirm', ['email' => Crypt::encrypt($email) , 'token' => $token], function ($m) use ($email) {
                $m->to($email)->subject('Comfirmare email');
            });
        }
        return response()->json($register);
    }
    public function exitadmin(){
        session()->forget('idAdmin');
        session()->forget('emailAdmin');
        session()->forget('nameAdmin');
        return redirect("/admin");
    }
}
