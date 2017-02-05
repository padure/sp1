<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Parteneriati extends Model
{
    public static function getParteneriati(){
        $result=DB::table("parteneriati")->get();
        return $result;
    }
}
