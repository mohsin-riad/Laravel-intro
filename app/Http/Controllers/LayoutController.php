<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
    public function sb_login(){
        return view('admin.pages.sb_login');
    }
    public function sb_register(){
        return view('admin.pages.sb_register');
    }
    public function sb_password(){
        return view('admin.pages.sb_password');
    }
    public function sb_chart(){
        return view('admin.pages.sb_chart');
    }
    public function sb_table(){
        return view('admin.pages.sb_table');
    }
    public function sb_static(){
        return view('admin.pages.sb_static');
    }
    public function sb_401(){
        return view('admin.pages.sb_401');
    }
    public function sb_404(){
        return view('admin.pages.sb_404');
    }
    public function sb_500(){
        return view('admin.pages.sb_500');
    }
}
