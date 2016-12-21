<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    public function getAllEvents(){
        $return=DB::table('events')
                    ->select('events.*','eventcontent.text')
                    ->leftJoin("eventcontent",function($join){
                            $join->on('events.id', '=', 'eventcontent.events_id');
                            $join->where('eventcontent.type',1);
                        })
                    ->orderby("events.id","desc")
                    ->get();
        $aseaza=[];
        $id=[];
        foreach($return as $i){
            if(!in_array($i->id,$id)){
                $id[]=$i->id;
                $aseaza[]=$i;
            }
        }
        return $aseaza;
    }
    
    public function getEvent($i){
        if(!isset($_COOKIE['views'])) {
            setcookie("views", $i, time()+30);
            DB::table("events")->where("id",$i)->increment('views');
        }else{
            if($_COOKIE['views']!=$i){
                setcookie("views", $i, time()+30);
                DB::table("events")->where("id",$i)->increment('views');
            }
        }
        $name=DB::table('events')
                    ->where("id",$i)
                    ->get();
        $content=DB::table('eventcontent')
                    ->where("events_id",$i)
                    ->where("type",1)
                    ->get();
        $others=DB::table('eventcontent')
                    ->where("events_id",$i)
                    ->where("type","<>",1)
                    ->get();
        $return=["name"=>$name,"content"=>$content,"others"=>$others];
        return $return;
    }
}
