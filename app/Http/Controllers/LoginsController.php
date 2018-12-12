<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginsController extends Controller
{
    //登录页面
    public function create(){
        return view('logins.create');
    }

    //登录
    public function store(){

    }

    //退出
    public function logout(){

    }
}
