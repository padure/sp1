<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use File;

class LogonameController extends Controller
{
    public function savenamesite(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $nume=$request->nume;
        $namesite = DB::table("logoname")->where("variable","namesite")->first();
        if(is_null($namesite)){
            DB::table("logoname")->insert(["variable"=>"namesite","valuevariable"=>$nume]);
        }else{
            DB::table("logoname")->where("variable","namesite")->update(["valuevariable"=>$nume]);
        }
        return $nume;
    }
    public function uploadlogo(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $response=[];
        $files=$request->file("file");
        $extensii=["jpeg","jpg","png","svg"];
        if ($request->hasFile('file')) {
            if($files->isValid()){
                $ext=strtolower($files->getClientOriginalExtension());
                if(in_array($ext, $extensii)){
                    $date=Carbon::now();
                    $name=$date->format("ymdhis");
                    $path="allimages/logo/";
                    if($files->move($path,$name.".".$ext)){
                        $filename=$path.$name.".".$ext;
                        $response=["succes"=>true,
                                   "image"=>$filename];
                        $logo = DB::table("logoname")->where("variable","logo")->first();
                        if(is_null($logo)){
                            DB::table("logoname")->insert(["variable"=>"logo","valuevariable"=>$filename]);
                        }else{
                            File::delete($logo->valuevariable);
                            DB::table("logoname")->where("variable","logo")->update(["valuevariable"=>$filename]);
                        }
                    }
                }
            }
            return response()->json($response);
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
}
