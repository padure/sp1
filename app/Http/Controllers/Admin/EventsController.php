<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Events;

class EventsController extends Controller
{
    public function saveevent(Request $request , Events $events){
        $title=$request->title;
        $content=$request->content;
        $paragraf=$request->paragraf;
        $e=new Events;
        $e->title = $title;
        $e->image = "default";
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
}
