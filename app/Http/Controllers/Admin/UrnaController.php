<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Urna;
use DB;
use File;

class UrnaController extends Controller
{
    public function urna(Urna $urna){
        $post=$urna->getUrna();
        return view("admin.urna",["post"=>$post]);
    }
    public function deleteurna(Urna $urna){
        $urna->deleteUrna();
        return redirect("/admin/urna");
    }
}
