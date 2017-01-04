<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Logoname extends Model
{
    public static function getInfo(){
        $logo=DB::table('logoname')->where("variable","logo")->first();
        $name=DB::table('logoname')->where("variable","namesite")->first();
        return ["logo"=>$logo,"namesite"=>$name];
    }
}
