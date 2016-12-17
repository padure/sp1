<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use DB;

class MainController extends Controller
{
    public function main(){
        return view('main.posts.post');
    }
}
