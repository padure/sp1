<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Corpdidactic extends Model
{
    public function getCorpdidactic(){
        return DB::table("corpdidactic")->get();
    }
}
