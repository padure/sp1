<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Regulamente extends Model
{
    public static function getRegulamente(){
        return DB::table('regulamente')->get();
    }
}
