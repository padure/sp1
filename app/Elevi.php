<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Elevi extends Model
{
    public function getEleviInfo(){
        $ani=DB::table("an")->orderBy("an")->get();
        $grupe=DB::table("grupe")->get();
        return ["ani"=>$ani,"grupe"=>$grupe];
    }
}
