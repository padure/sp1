<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admiterea extends Model
{
    public function getAdmiterea(){
        return DB::table('admiterea')->get();
    }
}
