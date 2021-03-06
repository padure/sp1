<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    public static function totalviews(){
        if(!isset($_COOKIE['totalviews'])) {
            setcookie("totalviews", true, time()+30);
            DB::table("totalviews")->increment('totalviews');
        }
        return DB::table("totalviews")->first();
    }
    public function getHomepage(){
        $countevent=DB::table("events")->count("id");
        $countslideshow=DB::table("slideshow")->count("id");
        $countelevi=DB::table("elevi")->count("id");
        $countparteneriati=DB::table("parteneriati")->count("id");
        $countcorpdidactic=DB::table("corpdidactic")->count("id");
        $countregulamente=DB::table("regulamente")->count("id");
        $countadmiterea=DB::table("admiterea")->count("id");
        $countgalerie=DB::table("galeriephotos")->count("id");
        $countadministratia=DB::table("administratia")->count("id");
        $countadmin=DB::table("admin")->count("id");
        $countprobleme=DB::table("problema")->count("id");
        $countfisierenefolosite=count(Urna::getInfoUrna());
        return ["countevent"=>$countevent,
                "countslideshow"=>$countslideshow,
                "countprobleme"=>$countprobleme,
                "countelevi"=>$countelevi,
                "countregulamente"=>$countregulamente,
                "countadmiterea"=>$countadmiterea,
                "countgalerie"=>$countgalerie,
                "countcorpdidactic"=>$countcorpdidactic,
                "countparteneriati"=>$countparteneriati,
                "countadministratia"=>$countadministratia,
                "countadmin"=>$countadmin,
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
