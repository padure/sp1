<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Regulamente extends Model
{
    public function getRegulamente(){
        return DB::table('regulamente')->get();
    }
}
