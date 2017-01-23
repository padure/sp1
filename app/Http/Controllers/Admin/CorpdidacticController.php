<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
Use App\Corpdidactic;

class CorpdidacticController extends Controller
{
    public function addcorpdidactic(Request $request){
        $nume=$request->nume;
        $prenume=$request->prenume;
        $functia=$request->functia;
        DB::table("corpdidactic")->insert([
                        "nume"=>  ucwords(strtolower($nume)),
                        "prenume"=>  ucwords(strtolower($prenume)),
                        "functia"=>ucwords(strtolower($functia))]);
        return DB::table("corpdidactic")->get();
    }
    public function modcorpdidactic(Request $request){
        $id=$request->id;
        $nume=$request->nume;
        $prenume=$request->prenume;
        $functia=$request->functia;
        DB::table("corpdidactic")->where("id",$id)->update([
            "nume"=>  ucwords(strtolower($nume)),
            "prenume"=>  ucwords(strtolower($prenume)),
            "functia"=>ucwords(strtolower($functia))
        ]);
        return DB::table("corpdidactic")->get();
    }
    public function delcorpdidactic(Request $request){
        $id=$request->id;
        DB::table("corpdidactic")->where("id",$id)->delete();
        return $id;
    }
}
