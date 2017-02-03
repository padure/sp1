<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Galerie;
use File;
use Carbon\Carbon;

class GalerieController extends Controller
{
    public function addgalerie(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $name=$request->nume;
        $id=DB::table("galerie")->insertGetId(["name"=>$name]);
        $return=DB::table("galerie")->where("id",$id)->first();
        return response()->json($return);
    }
    public function modgalerie(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $name=$request->nume;
        $id=$request->id;
        DB::table("galerie")->where("id",$id)->update(["name"=>$name]);
    }
    public function delgalerie(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        DB::table("galerie")->where("id",$id)->delete();
        $images=DB::table("galeriephotos")->where("galerie_id",$id)->get();
        foreach($images as $i){
            if(File::exists($i->address)){
                File::delete($i->address);
            }
            DB::table("galeriephotos")->where("id",$i->id)->delete();
        }
        
    }
    public function uploadgalerie(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $response=[];
        $files=$request->file("file");
        $id_galerie=$request->id_galerie;
        $extensii=["jpeg","jpg","png","svg"];
        if ($request->hasFile('file')) {
            foreach($files as $file){
                if($file->isValid()){
                    $ext=strtolower($file->getClientOriginalExtension());
                    if(in_array($ext, $extensii)){
                        if(filesize($file)<6000000){
                            $path="allimages/galerie/";
                            $date=Carbon::now();
                            $name=$date->format("ymdhis") + DB::table("galeriephotos")->max("id");
                            if($file->move($path,$name.".".$ext)){
                                $filename=$path.$name.".".$ext;
                                $id=DB::table("galeriephotos")->insertGetId(["galerie_id"=>$id_galerie,"address"=>$filename]);
                                $response[]=["succes"=>true,
                                             "image"=>asset($filename),
                                             "id"=>$id];
                            }
                        }
                    }
                }
            }
            return $response;
        }else{
            return response()->json(array('succes'=>"notfound"));
        }
    }
    public function deleteimagegalerie(Request $request){
        if (!filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return redirect("/admin");
        }
        $id=$request->id;
        $sterg=DB::table("galeriephotos")->where("id",$id)->value("address");
        if(File::exists($sterg)){
            File::delete($sterg);
        }
        DB::table("galeriephotos")->where("id",$id)->delete();
        return response()->json($id);
    }
    
    
}
