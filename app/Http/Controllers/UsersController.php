<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth',[
            'except'=>['index','create','show','store','confirmEmail']
        ]);

        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    //用户列表
    public function index(){
        $users = User::paginate(10);
        return view('users.index',['users'=>$users]);
    }

    //用户中心
    public function show(User $user){
        $statuses = $user->statuses()->orderBy('created_at','desc')->paginate(3);
        return view('users.show',compact('user','statuses'));
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

        $this->sendEmail($user);
        session()->flash('success','验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
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
    public function destroy(User $user){
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('info','删除用户成功');
        return back();
    }

    //激活邮箱
    public function confirmEmail($token){
        $user = User::where('activiated_token',$token)->firstOrFail();

        $user->activiated = true;
        $user->activiated_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success','恭喜你，激活成功！');
        return redirect()->route('users.show',[$user]);

    }

    //发送邮件
    public function sendEmail($user){
        $view = "emails.confirm";
        $data = compact('user');
        $from = "keducode@126.com";
        $name = "ZhYuan";
        $to = $user->email;
        $subject = "感谢注册 Laravel 应用！请确认你的邮箱。";
        Mail::send($view,$data,function($message) use($from,$name,$to,$subject){
               $message->from($from,$name)->to($to)->subject($subject);
        });

    }
}
