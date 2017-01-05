<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use File;
use Image;

class AdministratiaController extends Controller
{
    public function addadministratia(Request $request){
        $nume=$request->nume;
        $functia=$request->functia;
        $data=$request->data;
        $experienta=$request->experienta;
        $grad=$request->grad;
        $image=$request->image;
        DB::table("administratia")->insert([
            "anume"=>$nume,
            "photo"=>$image,
            "functia"=>$functia,
            "anulnasterii"=>$data,
            "experienta"=>$experienta,
            "grad"=>$grad,
        ]);
        return response()->json(true);
    }
    public function modadministratia(Request $request){
        $nume=$request->nume;
        $functia=$request->functia;
        $data=$request->data;
        $experienta=$request->experienta;
        $grad=$request->grad;
        $image=$request->image;
        $id=$request->id;
        DB::table("administratia")->where("id",$id)->update([
            "anume"=>$nume,
            "photo"=>$image,
            "functia"=>$functia,
            "anulnasterii"=>$data,
            "experienta"=>$experienta,
            "grad"=>$grad,
        ]);
        return response()->json(true);
    }
    public function deladministratia(Request $request){
        $id=$request->id;
        $photo=DB::table("administratia")->where("id",$id)->value("photo");
        File::delete($photo);
        DB::table("administratia")->where("id",$id)->delete();
    }
    public function uploadadministratia(Request $request){
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
                    $path="allimages/administratia/";
                    if($files->move($path,$name.".".$ext)){
                        $filename=$path.$name.".".$ext;
                        $response=["succes"=>true,
                                   "image"=>$filename];
                        Image::make($filename)->fit(800, 800)->save($filename)->destroy();
                        File::delete($request->image);
                    }
                }
            }
            return response()->json($response);
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
}
