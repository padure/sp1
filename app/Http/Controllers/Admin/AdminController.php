<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function base(){
        if (filter_var(session("emailAdmin"), FILTER_VALIDATE_EMAIL)){
            return view("admin.home");
        }else{
            return redirect("/admin/login");
        }
    }
    public function getLogin(){
        return view('admin.partials.login');
    }
    public function getRegister(){
        return view('admin.partials.register');
    }
}
