<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function home($c){
        $name='mohsin';
        $id='1393';
        $e = array("Peter", "Ben", "Joe");
        return view('history',['name'=>$name, 'id'=>$id,'category'=>$c,'emp'=>$e]);
    }
}
