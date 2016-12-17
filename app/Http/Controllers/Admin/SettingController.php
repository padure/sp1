<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SettingController extends Controller
{
    public function deleteadmin(Request $request){
        $id=$request->id;
        $permision=DB::table("admin")->min("id");
        $session=session("idAdmin");
        if($permision==$session){
            DB::table("admin")->where("id",$id)->delete();
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
}
