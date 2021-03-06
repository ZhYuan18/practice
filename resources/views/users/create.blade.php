@extends('layouts._main')
@section('title','注册')

@section('content')
    <div class="form_box">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">注册</div>
                    <div class="card-body">
                        @include('shared._error')
                        <form action="{{ route('users.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>用户名：</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                            </div>

                            <div class="form-group">
                                <label>邮箱：</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}"/>
                            </div>

                            <div class="form-group">
                                <label>密码：</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"/>
                            </div>

                            <div class="form-group">
                                <label>确认密码：</label>
                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"/>
                            </div>

                            <button type="submit" class="btn btn-primary">注册</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop