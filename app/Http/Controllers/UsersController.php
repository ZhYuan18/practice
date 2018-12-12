<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth',[
            'except'=>['index','create','show','store']
        ]);

        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    //用户列表
    public function index(){

    }
    //用户中心
    public function show(User $user){
        return view('users.show',compact('user'));
    }
    //创建用户页面
    public function create(){
        return view('users.create');
    }
    //创建用户
    public function store(Request $request){

        //验证信息
        $this->validate($request,[
            'name'=>'required|min:2|max:5',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show',[$user]);
    }
    //编辑用户页面
    public function edit(User $user){
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }
    //编辑用户
    public function update(User $user,Request $request){
        //数据校验
        $this->validate($request,[
            'name'=>'required',
            'password'=>'nullable|min:6|confirmed',
        ]);

        $this->authorize('update',$user);

        $data = [];

        $data['name'] = $request->name;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success','更新资料成功');
        return redirect()->route('users.show',$user->id);
    }
    //删除用户
    public function destroy(){

    }
}
