<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IndexsController extends Controller
{
    //首页
    public function index(){
        $user = new User();
        $statuses = $user->getStatus();


       foreach ($statuses as $status){
            $status->created_at = $this->getCreatedAtAttribute($status->created_at);
        }
        return view('indexs.index',compact('statuses'));
    }

    //时间处理
    public function getCreatedAtAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
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
