<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    public function getHomepage(){
        $countevent=DB::table("events")->count("id");
        $countslideshow=DB::table("slideshow")->count("id");
        $countelevi=DB::table("elevi")->count("id");
        $countadministratia=DB::table("administratia")->count("id");
        $countfisierenefolosite=count(Urna::getInfoUrna());
        return ["countevent"=>$countevent,
                "countslideshow"=>$countslideshow,
                "countelevi"=>$countelevi,
                "countadministratia"=>$countadministratia,
                "countfisierenefolosite"=>$countfisierenefolosite,
            ];
    }
    public function getEmail($email){
        $este=DB::table('admin')->where('email',  $email)->value('email');
        if(empty($este))
        {
            return false; 
        }
        else
        {
            return true; 
        }
    }
    public function getAdmins(){
        $return=DB::table("admin")
                ->where("id","<>",session("idAdmin"))
                ->get();
        return $return;
    }
}
