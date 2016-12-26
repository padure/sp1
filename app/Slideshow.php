<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Slideshow extends Model
{
    public static function getSlideshow(){
        $return=DB::table("slideshow")->orderBy("id","desc")->get();
        return $return;
    }
}
