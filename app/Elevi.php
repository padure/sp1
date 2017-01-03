<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Elevi extends Model
{
    public function getEleviInfo(){
        $ani=DB::table("an")->orderBy("an")->get();
        $grupe=DB::table("grupe")->orderBy("nume_grupa")->get();
        return ["ani"=>$ani,"grupe"=>$grupe];
    }
    public function getElevi($grupa){
        $return=DB::table("elevi")
                ->leftJoin("grupe",function($join){
                    $join->on('grupe.id', '=', 'elevi.id_grupa');
                })
                ->leftJoin("an",function($join){
                    $join->on('an.id', '=', 'grupe.id_an');
                })
                ->where("id_grupa",$grupa)
                ->get();
        return $return;
    }
}
