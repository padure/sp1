<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Orar extends Model
{
    public function getOrar(){
        $return=DB::table("orar")->get();
        return $return;
    }
}
