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
                                            "nume"=>ucfirst($nume),
                                            "prenume"=>ucfirst($prenume)]);
        $return=DB::table("elevi")->where("id_grupa",$id_grupa)->orderBy("nume")->orderBy("prenume")->get();
        return response()->json($return);
    }
    public function modelev(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $nume=$request->nume;
        $prenume=$request->prenume;
        DB::table("elevi")->where("id",$id)->update(["nume"=>ucfirst($nume),"prenume"=>ucfirst($prenume)]);
        $id_grupa=DB::table("elevi")->where("id",$id)->value("id_grupa");
        $return=DB::table("elevi")->where("id_grupa",$id_grupa)->orderBy("nume")->orderBy("prenume")->get();
        return response()->json($return);
    }
    public function stergeelev(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $id_grupa=DB::table("elevi")->where("id",$id)->value("id_grupa");
        DB::table("elevi")->where("id",$id)->delete();
        $return=DB::table("elevi")->where("id_grupa",$id_grupa)->orderBy("nume")->orderBy("prenume")->get();
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
