<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //设置密码页面
    public function showResetForm($token){
        return view('auth.password.reset',['token'=>$token]);
    }

    //更新密码
    public function reset(Request $request){

        //验证数据
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|confirmed|min:6'
        ]);

        //检测邮箱是否存在
        $user = User::where('email',$request->email)->first();
        if(empty($user)){
            //不存在用户
            session()->flash('is_user','该邮箱还没有被注册');
            return back()->withInput();
        }
        else{
            //存在用户
            $userinfo = DB::table('password_resets')->where([
                'email'=>$request->email,
                'token'=>$request->token
            ])->first();


            if(empty($userinfo)){
                session()->flash('status','重置密码失败');
                return back()->withInput();
            }

            $user = User::where('email',$request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            session()->flash('info','重置密码成功');
            return redirect()->route('login');

        }
    }
}
