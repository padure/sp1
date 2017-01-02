<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Elevi;

class EleviController extends Controller
{
    public function addan(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $an=$request->an;
        $id=DB::table("an")->insertGetId(["an"=>$an]);
        $return=DB::table("an")->where("id",$id)->first();
        return response()->json($return);
    }
    public function addgrupa(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $nume_grupa=$request->grupa;
        $id_an=$request->id_an;
        $id=DB::table("grupe")->insertGetId(["id_an"=>$id_an,"nume_grupa"=>$nume_grupa]);
        $return=DB::table("grupe")->where("id",$id)->first();
        return response()->json($return);
    }
    public function addelev(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id_grupa=$request->id_grupa;
        $nume=$request->nume;
        $prenume=$request->prenume;
        $id=DB::table("elevi")->insertGetId(["id_grupa"=>$id_grupa,
                                            "nume"=>$nume,
                                            "prenume"=>$prenume]);
        $return=DB::table("elevi")->where("id",$id)->first();
        return response()->json($return);
    }
    public function getelevi(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $grupa=$request->grupa;
        $return=DB::table("elevi")->where("id_grupa",$grupa)->orderBy("nume")->orderBy("prenume")->get();
        return response()->json($return);
    }
}
