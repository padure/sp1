<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use File;

class OrarController extends Controller
{
    public function uploadorar(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $response=[];
        $files=$request->file("file");
        $extensii=["pdf"];
        if ($request->hasFile('file')){
            if($files->isValid()){
                $ext=strtolower($files->getClientOriginalExtension());
                if(in_array($ext, $extensii)){
                    $date=Carbon::now();
                    $name=$date->format("ymdhis");
                    $path="files/orar/";
                    if($files->move($path,$name.".".$ext)){
                        $filename=$path.$name.".".$ext;
                        $orar = DB::table("orar")->where("variable","orar")->first();
                        if(is_null($orar)){
                            DB::table("orar")->insert(["variable"=>"orar","valuevariable"=>$filename]);
                        }else{
                            File::delete($orar->valuevariable);
                            DB::table("orar")->where("variable","orar")->update(["valuevariable"=>$filename]);
                        }
                        $response=["succes"=>true];
                    }
                }
            }
            return response()->json($response);
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
    public function uploadorarmodificat(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $response=[];
        $files=$request->file("file");
        $extensii=["pdf"];
        if ($request->hasFile('file')){
            if($files->isValid()){
                $ext=strtolower($files->getClientOriginalExtension());
                if(in_array($ext, $extensii)){
                    $date=Carbon::now();
                    $name=$date->format("ymdhis")."m";
                    $path="files/orar/";
                    if($files->move($path,$name.".".$ext)){
                        $filename=$path.$name.".".$ext;
                        $orar = DB::table("orar")->where("variable","orarmodificat")->first();
                        if(is_null($orar)){
                            DB::table("orar")->insert(["variable"=>"orarmodificat","valuevariable"=>$filename]);
                        }else{
                            File::delete($orar->valuevariable);
                            DB::table("orar")->where("variable","orarmodificat")->update(["valuevariable"=>$filename]);
                        }
                        $response=["succes"=>true];
                    }
                }
            }
            return response()->json($response);
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
}
