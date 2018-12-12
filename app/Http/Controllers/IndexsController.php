<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexsController extends Controller
{
    //首页
    public function index(){
        return view('indexs.index');
    }

    //帮助
    public function help(){
        return view('indexs.help');
    }

    //关于
    public function about(){
        return view('indexs.about');
    }
}
