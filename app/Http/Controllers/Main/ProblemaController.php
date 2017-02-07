<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProblemaController extends Controller
{
    public function intrebari(Request $request){
        DB::table("problema")->insert([
            "nume"=>$request->nume,
            "prenume"=>$request->prenume,
            "telefon"=>$request->telefon,
            "email"=>$request->email,
            "problema"=>$request->problema,
        ]);
    }
    public function delproblema(Request $request){
        DB::table("problema")->where("id",$request->id)->delete();
    }
}
