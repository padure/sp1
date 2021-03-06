<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use File;

class Urna extends Model
{
    public static function getInfoUrna(){
        $events=DB::table("events")->pluck("image");
        $administratia=DB::table("administratia")->pluck("photo");
        $eventcontent=DB::table("eventcontent")->where("isimage",1)->pluck("text");
        $parteneriati=DB::table("parteneriati")->pluck("image");
        
        $urna=null;
        if(count($events)>0 || count($administratia)>0 || count($eventcontent)>0 || count($parteneriati)>0){
            $urna=DB::table("urna")->whereNotIn("urna",$events)
                                    ->whereNotIn("urna",$administratia)
                                    ->whereNotIn("urna",$eventcontent)
                                    ->whereNotIn("urna",$parteneriati)
                            ->pluck("urna");
        }else{
            if((count($events)+count($administratia)+count($eventcontent)+count($parteneriati))==0){
                $urna=DB::table("urna")->pluck("urna");
            }
        }
        return $urna;
    }
    public function getUrna(){
        $urna=Urna::getInfoUrna();
        if(count($urna)>0){
            $mb=0;
            foreach($urna as $i){
                if(File::exists($i)){
                    $mb+=File::size($i);
                }
            }
            return ["fisierenefolosite"=>count($urna),
                    "fisierenefolositoaresize"=>number_format( $mb/ 1048576, 2)];
        }
    }
    public function deleteUrna(){
        $urna=Urna::getInfoUrna();
        foreach($urna as $i){
            if(File::exists($i)){
                File::delete($i);
            }
            DB::table("urna")->where("urna",$i)->delete();
        }
    }
}
