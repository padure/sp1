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
use App\Administratia;
use App\Parteneriati;
use App\Corpdidactic;
use App\Regulamente;
use App\Orar;
use App\Admiterea;
use App\Galerie;

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
    public function corpdidactic(Corpdidactic $corp){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$corp->getCorpdidactic();
            return view('admin.corpdidactic',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function regulamente(Regulamente $regulamente){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$regulamente->getRegulamente();
            return view('admin.regulamente',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function admiterea(Admiterea $admiterea){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$admiterea->getAdmiterea();
            return view('admin.admiterea',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function galerie(Galerie $galerie){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$galerie->getGalerie();
            return view('admin.galerie',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function orar(Orar $orar){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$orar->getOrar();
            return view('admin.orar',['post'=>$post]);
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
    public function administratia(Administratia $administratia){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$administratia->getAdministratia();
            return view('admin.administratia',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    public function parteneriati(Parteneriati $parteneriati){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            $post=$parteneriati->getParteneriati();
            return view('admin.parteneriati',['post'=>$post]);
        }else{
            return redirect("/admin/login");
        }
    }
    
}
