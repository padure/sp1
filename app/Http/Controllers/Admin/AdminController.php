<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin;
use App\Events;

class AdminController extends Controller
{
    public function base(){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return view("admin.home");
        }else{
            return redirect("/admin/login");
        }
    }
    public function admins(Admin $admin){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $result=$admin->getAdmins();
            return view("admin.admins",["admins"=>$result]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function getLogin(){
        $first=DB::table('admin')->where('confirmed',1)->count();
        if($first>0)
        {
            return view('admin.partials.login');
        }
        else{
            return redirect('/admin/register');
        }
    }
    public function getRegister(){
        $first=DB::table('admin')->where('confirmed',1)->count();
        if($first>0)
        {
            return redirect('/admin/login');
        }
        else{
            return view('admin.partials.register');
        }
    }
    public function events(){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return view("admin.events");
        }else{
            return redirect("/admin/login");
        }
    }
}
