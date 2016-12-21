<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Events;
use Image;
use File;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function saveevent(Request $request , Events $events){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $title=$request->title;
        $image=$request->image;
        $save=$request->save;
        $mode=$request->mode;
        $isimage=$request->isimage;
        $e=new Events;
        $e->title = $title;
        $e->image = $image;
        $e->save();
        $id=$e->id;
        $insert=[];
        if (count($save)>=1){
            for($i=0;$i<count($save);$i++){
                if(strlen($save[$i])>=1){
                    if($isimage[$i]==1){
                        $insert[$i]=["events_id"=>$id,"text"=>$save[$i],"type"=>$mode[$i],"isimage"=>1];
                    }else{
                        $insert[$i]=["events_id"=>$id,"text"=>$save[$i],"type"=>$mode[$i],"isimage"=>0];
                    }
                }
            }
            DB::table("eventcontent")->insert($insert);
        }
        return response()->json();
    }
    
    public function defaultupload(Request $request){
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
                    $path="allimages/eventimages/default/";
                    if($files->move($path,$name.".".$ext)){
                        File::delete($request->image);
                        $filename=$path.$name.".".$ext;
                        Image::make($filename)->fit(800, 800)->save($filename)->destroy();
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
    public function othersupload(Request $request){
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
                    $path="allimages/eventimages/others/";
                    if($files->move($path,$name.".".$ext)){
                        File::delete($request->image);
                        $filename=$path.$name.".".$ext;
                        Image::make($filename)->fit(1200, 1200)->save($filename)->destroy();
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
    public function modificapost(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $title=$request->title;
        $image=$request->image;
        $save=$request->save;
        $mode=$request->mode;
        $isimage=$request->isimage;
        DB::table("events")->where("id",$id)->update(["title"=>$title,"image"=>$image,"updated_at"=>Carbon::now()]);
        $insert=[];
        DB::table("eventcontent")->where("events_id",$id)->delete();
        if (count($save)>=1){
            for($i=0;$i<count($save);$i++){
                if(strlen($save[$i])>=1){
                    if($isimage[$i]==1){
                        $insert[$i]=["events_id"=>$id,"text"=>$save[$i],"type"=>$mode[$i],"isimage"=>1];
                    }else{
                        $insert[$i]=["events_id"=>$id,"text"=>$save[$i],"type"=>$mode[$i],"isimage"=>0];
                    }
                }
            }
            DB::table("eventcontent")->insert($insert);
        }
        return response()->json();
    }
    public function deleteevent(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $images=DB::table("eventcontent")->where("events_id",$id)->where("isimage",1)->get();
        foreach($images as $i){
            File::delete($i->text);
        }
        DB::table("eventcontent")->where("events_id",$id)->delete();
        File::delete(DB::table("events")->where("id",$id)->value("image"));
        DB::table("events")->where("id",$id)->delete();
    }
}
