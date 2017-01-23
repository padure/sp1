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
                        "nume"=>  ucfirst(strtolower($nume)),
                        "prenume"=>ucfirst(strtolower($prenume)),
                        "functia"=>ucfirst(strtolower($functia))]);
    }
}
