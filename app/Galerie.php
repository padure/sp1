<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Galerie extends Model
{
    public function getGalerie(){
        $return=DB::table("galerie")->get();
        return $return;
    }
    public static function getImages($id){
        return DB::table("galeriephotos")->where("galerie_id",$id)->orderBy("id","desc")->get();
    }
}
