<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admiterea extends Model
{
    public static function getAdmiterea(){
        return DB::table('admiterea')->get();
    }
}
