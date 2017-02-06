<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use DB;
use App\Events;
use App\Elevi;
use App\Administratia;
use App\Corpdidactic;

class MainController extends Controller
{
    public function main(Events $events){
        $posts=$events->getAllEvents();
        return view('main.posts.post',['posts'=>$posts]);
    }
    public function infopost(Events $events , $i){
        $post=$events->getEvent($i);
        return view('main.posts.infopost',['post'=>$post]);
    }
    public function operator(){
        return view('main.meniu.meserii.operator');
    }
    public function controlor(){
        return view('main.meniu.meserii.controlor');
    }
    public function bucatar(){
        return view('main.meniu.meserii.bucatar');
    }
    public function croitor(){
        return view('main.meniu.meserii.croitor');
    }
    public function cofetar(){
        return view('main.meniu.meserii.cofetar');
    }
    public function administratia(Administratia $administratia){
        $post=$administratia->getAdministratia();
        return view('main.meniu.despre-noi.administratia',["post"=>$post]);
    }
    public function misiune(){
        return view('main.meniu.despre-noi.despre-noi');
    }
    public function plan(){
        return view('main.meniu.despre-noi.plan');
    }
    public function organigrama(){
        return view('main.meniu.despre-noi.organigrama');
    }
    public function corpul(Corpdidactic $corp){
        $post=$corp->getCorpdidactic();
        return view('main.meniu.despre-noi.corpul',["post"=>$post]);
    }
    /*Regulamentele interne*/
     public function regulamente($id){
        $return=DB::table("regulamente")->where("id",$id)->first();
        return view('main.meniu.regulamente.regulament',["post"=>$return]);
    }
    /*Admitere*/
     public function admitere($id){
        $return=DB::table("admiterea")->where("id",$id)->first();
        return view('main.meniu.admitere.admiterea',["post"=>$return]);
    }
    /*Parteneriate*/
     public function parteneriat($parteneriat){
        return view('main.meniu.parteneriate.parteneriat');
    }
    /*Parteneriate*/
    public function absolvent(Elevi $elevi){
        $post=$elevi->getEleviInfo();
        return view('main.meniu.elevi.elev',["post"=>$post]);
    }
    public function getelevi(Request $request , Elevi $elevi){
        $grupa=$request->grupa;
        return response()->json($elevi->getElevi($grupa));
    }
    /*Galerie*/
     public function galerie($id){
        $return["name"]=DB::table("galerie")->where("id",$id)->value("name");
        $return["items"]=DB::table("galeriephotos")->where("galerie_id",$id)->get();
        return view('main.meniu.galerie.activitati',["post"=>$return]);
    }
    /*Contacte*/
    public function contacte(){
        return view('main.meniu.contacte.contact');
    }
    /*Orar*/
    public function activitatilunare(){
        $post=DB::table("orar")->where("variable","activitati")->first();
        return view('main.meniu.orar.activitati_lunare',["post"=>$post]);
    }
    public function orar(){
        $post=DB::table("orar")->where("variable","orar")->first();
        return view('main.meniu.orar.orar',["post"=>$post]);
    }
    public function orarmodificat(){
        $post=DB::table("orar")->where("variable","orarmodificat")->first();
        return view('main.meniu.orar.orar-modificat',["post"=>$post]);
    }
}
