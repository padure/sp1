<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
Use Image;
use Carbon\Carbon;

class ParteneriatiController extends Controller
{
    public function uploadimageparteneriat(Request $request){
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
                    $path="allimages/parteneriati/";
                    if($files->move($path,$name.".".$ext)){
                        $filename=$path.$name.".".$ext;
                        DB::table("urna")->insert(["urna"=>$filename]);
                        DB::table("urna")->where("urna",$request->image)->delete();
                        File::delete($request->image);
                        $response=["succes"=>true,
                                   "image"=>$filename];
                    }
                }
            }
            return response()->json($response);
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
    public function saveparteneriat(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $link=$request->link;
        $logo=$request->logo;
        $tip=$request->tip;
        DB::table('parteneriati')->insert(["link"=>$link,"image"=>$logo,"tip"=>$tip]);
        return response()->json(true);
    }
    public function modparteneriat(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $link=$request->link;
        $logo=$request->logo;
        $id=$request->id;
        $tip=$request->tip;
        DB::table('parteneriati')
                ->where("id",$id)
                ->update(["link"=>$link,"image"=>$logo,"tip"=>$tip]);
        return response()->json(true);
    }
    public function delparteneriat(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $image=DB::table('parteneriati')->where("id",$id)->value("image");
        File::delete($image);
        DB::table('parteneriati')->where("id",$id)->delete();
        return response()->json(true);
    }
}
