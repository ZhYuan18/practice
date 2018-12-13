<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //填写邮箱页面
    public function showLinkRequestForm(){
        return view('auth.password.email');
    }

    //发送邮件
    public function sendResetLinkEmail(Request $request){

        $this->validate($request,[
            'email'=>'required|email'
        ]);

        //看输入的邮箱是否注册过
        $user = User::where('email',$request->email)->first();
        if(empty($user)){
            //不存在用户
            session()->flash('is_user','该邮箱还没有被注册');
            return back()->withInput();
        }
        else{
            //存在用户

            //生成令牌
            $token = str_random(20);

            //实例化用户对象
            $user = User::where('email',$request->email)->firstOrFail();
            $user->token = $token;

            //将token信息写入到password_resets表
            DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>date('Y-m-d H:i:s'),
            ]);

            //发送邮件
            $this->sendEmail($user);
            session()->flash('status','密码重置邮件已发送!');
            return back();
        }

    }

    //发送邮件
    public function sendEmail($user){
        $view = "emails.reset";
        $data = compact('user');
        $from = "keducode@126.com";
        $name = "ZhYuan";
        $to = $user->email;
        $subject = "Laravel 重置密码邮件";
        Mail::send($view,$data,function($message) use($from,$name,$to,$subject){
            $message->from($from,$name)->to($to)->subject($subject);
        });
    }
}
