<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    public function getAllEvents(){
        $return=DB::table('events')
                    ->get();
        return $return;
    }
    
    public function getEvent($i){
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
