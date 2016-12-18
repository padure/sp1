<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use DB;
use App\Events;

class MainController extends Controller
{
    public function main(Events $events){
        $posts=$events->getAllEvents();
        return view('main.posts.post',['posts'=>$posts]);
    }
    public function infopost(Events $events , $i){
        $post=$events->getEvent($i);
        return view('main.posts.infopost',['post'=>$post]);
    }
    public function meserii($meserii){
        return view('main.meniu.meserii.meserie');
    }
    public function administratia(){
        return view('main.meniu.despre-noi.administratia');
    }
    public function misiune(){
        return view('main.meniu.despre-noi.despre-noi');
    }
    public function plan(){
        return view('main.meniu.despre-noi.plan');
    }
}
