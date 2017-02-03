<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Slideshow;
use DB;
use File;

class SlideshowController extends Controller
{
    public function uploadslideshow(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $response=[];
        $files=$request->file("file");
        $prod=$request->id;
        $extensii=["jpeg","jpg","png","svg"];
        if ($request->hasFile('file')) {
            foreach($files as $file){
                if($file->isValid()){
                    $ext=strtolower($file->getClientOriginalExtension());
                    if(in_array($ext, $extensii)){
                        if(filesize($file)<6000000){
                            $path="allimages/slideshow/";
                            $date=Carbon::now();
                            $name=$date->format("ymdhis") + DB::table("slideshow")->max("id");
                            if($file->move($path,$name.".".$ext)){
                                $filename=$path.$name.".".$ext;
                                $id=DB::table("slideshow")->insertGetId(["slideimage"=>$filename]);
                                $response[]=["succes"=>true,
                                             "image"=>asset($filename),
                                             "id"=>$id];
                            }
                        }
                    }
                }
            }
            return $response;
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
    public function deleteimageslider(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $sterg=DB::table("slideshow")->where("id",$id)->value("slideimage");
        if(File::exists($sterg)){
            File::delete($sterg);
        }
        DB::table("slideshow")->where("id",$id)->delete();
        return response()->json(["succes"=>true]);
        
    }
}
