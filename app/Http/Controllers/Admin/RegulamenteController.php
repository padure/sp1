<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use File;

class RegulamenteController extends Controller
{
    public function addregulament(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $nume=$request->nume;
        $response=[];
        $files=$request->file("file");
        $extensii=["pdf"];
        if ($request->hasFile('file')){
            if($files->isValid()){
                $ext=strtolower($files->getClientOriginalExtension());
                if(in_array($ext, $extensii)){
                    $date=Carbon::now();
                    $name=$date->format("ymdhis");
                    $path="files/regulamente/";
                    if($files->move($path,$name.".".$ext)){
                        $filename=$path.$name.".".$ext;
                        DB::table("regulamente")->insert(["nume"=>$nume,"link"=>$filename]);
                        $response=["succes"=>true,
                                   "link"=>$filename];
                    }
                }
            }
            return response()->json($response);
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
    public function delregulament(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $valoare=DB::table("regulamente")->where("id",$id)->value("link");
        if(File::exists($valoare)){
            File::delete($valoare);
        }
        DB::table("regulamente")->where("id",$id)->delete();
    }
}
