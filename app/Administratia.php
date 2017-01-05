<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Administratia extends Model
{
    public static function getAdministratia(){
        $return=DB::table('administratia')->get();
        return $return;
    }
}
