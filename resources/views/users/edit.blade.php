@extends('layouts._main')
@section('title','更新个人资料')

@section('content')
    <div class="form_box">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">更新个人资料</div>
                    <div class="card-body">
                        @include('shared._error')
                        <div class="userinfo_avatar">
                            <img src="{{ $user->gravatar() }}"/>
                        </div>
                        <form action="{{ route('users.update',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label>用户名：</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
                            </div>

                            <div class="form-group">
                                <label>邮箱：</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled/>
                            </div>

                            <div class="form-group">
                                <label>密码：</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"/>
                            </div>

                            <div class="form-group">
                                <label>确认密码：</label>
                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"/>
                            </div>

                            <button type="submit" class="btn btn-primary">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop