<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Crypt;

class SettingController extends Controller
{
    public function deleteadmin(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $permision=DB::table("admin")->min("id");
        $session=session("idAdmin");
        if($permision==$session){
            DB::table("admin")->where("id",$id)->delete();
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
    public function changename(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $name=$request->name;
        $email=$request->email;
        if(strlen($name)>0 && strlen($name)<100 && filter_var($email, FILTER_VALIDATE_EMAIL)){
            DB::table("admin")->where("id",session("idAdmin"))->update(["name"=>$name,"email"=>$email]);
            session(["nameAdmin"=>$name,
                    "emailAdmin"=>$email,
                   ]);
        }
    }
    public function changepassword(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $parolaveche=$request->parolaveche;
        $password=$request->password;
        $repeatpassword=$request->repeatpassword;
        $return=[];
        $parola=DB::table("admin")->where("id",session("idAdmin"))->value("password");
        if(Hash::check($parolaveche,$parola)){
            if(strlen($password)>=6 && strlen($password)<50){
                if(strcmp($password,$repeatpassword)==0){
                    DB::table("admin")->where("id",session("idAdmin"))->update(["password"=>bcrypt(strtolower($password))]);
                    return response()->json(true);
                }else{
                    $return["repeatpassword"]="*";
                }
            }else{
                $return["password"]="*";
            }
        }else{
            $return["parolaveche"]="*";
        }
        return $return;
    }
}
