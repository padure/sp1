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
    public function events(Events $events){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $posts=$events->getAllEvents();
            return view('admin.events',['posts'=>$posts]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function newevent(){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return view("admin.newevent");
        }else{
            return redirect("/admin/login");
        }
    }
    public function modifica(Events $events , $id){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$events->getEvent($id);
            return view('admin.modevent',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
}
