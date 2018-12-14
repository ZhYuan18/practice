<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gravatar($size = '100'){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?size=$size";
    }

    //模型初始化后监听事件(设置令牌)
    public static function boot(){
        parent::boot();
        static::creating(function($user){
            $user->activiated_token = str_random(30);
        });
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    //关联动态表
    public function statuses(){
        return $this->hasMany(Status::class);
    }

    //获取所有的动态
    public function getStatus(){

      return $statuses = DB::table('statuses')
            ->join('users','statuses.user_id','=','users.id')
            ->orderBy('statuses.created_at','desc')
            ->select('users.name','statuses.*')
            ->paginate(3);

    }
}
