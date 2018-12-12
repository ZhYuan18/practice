@extends('layouts._main')
@section('title','登录')

@section('content')
    <div class="form_box">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">登录</div>
                    <div class="card-body">
                        @include('shared._error')
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>邮箱：</label>
                                <input type="text" name="email" class="form-control" value=""/>
                            </div>

                            <div class="form-group">
                                <label>密码：</label>
                                <input type="password" name="password" class="form-control" value=""/>
                            </div>

                            <div class="checkbox" id="remember_box">
                                <label><input type="checkbox" name="remember"/>记住我</label>
                            </div>

                            <button type="submit" class="btn btn-primary">登录</button>

                            <div class="dropdown-divider"></div>

                            <div>
                                还没账号？<a href="{{ route('users.create') }}">现在注册</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop