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
        $content=$request->content;
        $paragraf=$request->paragraf;
        $e=new Events;
        $e->title = $title;
        $e->image = $image;
        $e->save();
        $id=$e->id;
        $insert=[];
        if (count($content)>=1){
            foreach($content as $i){
                $insert[]=["events_id"=>$id,"text"=>$i,"type"=>1];
            }
            DB::table("eventcontent")->insert($insert);
        }
        $insert=[];
        if (count($paragraf)>=1){
            foreach($paragraf as $i){
                $insert[]=["events_id"=>$id,"text"=>$i,"type"=>2];
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
}
