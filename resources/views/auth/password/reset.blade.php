@extends('layouts._main')
@section('title','更新密码')

@section('content')
    <div class="email_reset_box  row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    重置密码
                </div>
                <div class="card-body">
                    @if(session()->has('is_user'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session()->get('is_user') }}</li>
                            </ul>
                        </div>
                    @else
                        @include('shared._error')
                    @endif

                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="post">

                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}"/>

                        <div class="form-group">
                            <label>邮箱地址：</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>密码：</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>确认密码：</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">修改密码</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop