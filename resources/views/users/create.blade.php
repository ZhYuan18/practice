@extends('layouts._main')
@section('title','注册')

@section('content')
    <div class="form_box">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">注册</div>
                    <div class="card-body">
                        <form action="" method="">
                            <div class="form-group">
                                <label>用户名：</label>
                                <input type="text" name="name" class="form-control" value=""/>
                            </div>

                            <div class="form-group">
                                <label>邮箱：</label>
                                <input type="text" name="email" class="form-control" value=""/>
                            </div>

                            <div class="form-group">
                                <label>密码：</label>
                                <input type="password" name="password" class="form-control" value=""/>
                            </div>

                            <div class="form-group">
                                <label>确认密码：</label>
                                <input type="password" name="confirmPassword" class="form-control" value=""/>
                            </div>

                            <button type="submit" class="btn btn-primary">注册</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop