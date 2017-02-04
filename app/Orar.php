<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Orar extends Model
{
    public function getOrar(){
        $orar=DB::table('orar')->where("variable","orar")->first();
        $orarmodificat=DB::table('orar')->where("variable","orarmodificat")->first();
        $activitati=DB::table('orar')->where("variable","activitati")->first();
        return ["orar"=>$orar,"orarmodificat"=>$orarmodificat,"activitati"=>$activitati];
    }
}
