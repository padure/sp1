<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    public function getAllEvents($pag){
        $nrPePag=10;
        $return=DB::table('events')
                    ->select('events.*','eventcontent.text')
                    ->leftJoin("eventcontent",function($join){
                            $join->on('events.id', '=', 'eventcontent.events_id');
                            $join->where('eventcontent.type',1);
                        })
                    ->orderby("events.id","desc")
                    ->skip(($pag-1)*$nrPePag)->take($nrPePag)
                    ->get();
        $afiseaza=[];
        foreach($return as $key => $item)
        {   $afiseaza[$item->id]['item']=$item;
            $afiseaza[$item->id]['content'][$key] = $item->text;
        }
        return $afiseaza;
    }
    public function getAllEventsAdmin(){
        $return=DB::table('events')
                    ->select('events.*','eventcontent.text')
                    ->leftJoin("eventcontent",function($join){
                            $join->on('events.id', '=', 'eventcontent.events_id');
                            $join->where('eventcontent.type',1);
                        })
                    ->orderby("events.id","desc")
                    ->get();
        $afiseaza=[];
        foreach($return as $key => $item)
        {   $afiseaza[$item->id]['item']=$item;
            $afiseaza[$item->id]['content'][$key] = $item->text;
        }
        return $afiseaza;
    }
    public function getPaginare(){
        $nrPePag=10;
        $total=DB::table('events')
                ->count();
        if ($total%$nrPePag==0){
            $total=(int)($total/$nrPePag);
        }
        else{
            $total=(int)($total/$nrPePag)+1;
        }
        return $total;
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
