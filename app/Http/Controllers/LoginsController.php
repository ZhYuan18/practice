<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    public function __construct(){

        $this->middleware('guest',[
            'only'=>['create']
        ]);

    }

    //登录页面
    public function create(){
        return view('logins.create');
    }

    //登录
    public function store(Request $request){

        $credentials = $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials,$request->has('remember'))){
            //认证成功操作
            //判断有没有激活
            if(Auth::user()->activiated){
                session()->flash('info','欢迎回来！');
                return redirect()->intended(route('users.show',[Auth::user()]));
            }
            else{
                Auth::logout();
                session()->flash('warning','你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('/');
            }
        }
        else{
            //认证失败操作
            session()->flash('danger','登录失败，用户名或密码错误');
            return redirect()->route('login');
        }
        return;
    }

    //退出
    public function destroy(){
        Auth::logout();
        session()->flash('info','退出成功');
        return redirect()->route('login');
    }
}
