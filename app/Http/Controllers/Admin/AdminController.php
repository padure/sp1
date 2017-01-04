<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin;
use App\Events;
use App\Slideshow;
use App\Elevi;
use App\Logoname;

class AdminController extends Controller
{
    public function base(Admin $admin){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $count=$admin->getHomepage();
            return view("admin.home",$count);
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
    public function slideshow(Slideshow $slideshow){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$slideshow->getSlideshow();
            return view('admin.slideshow',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function elevi(Elevi $elevi){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$elevi->getEleviInfo();
            return view('admin.elevi',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function logoname(Logoname $logoname){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$logoname->getInfo();
            return view('admin.logoname',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
}
