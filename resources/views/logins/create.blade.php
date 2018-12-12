@extends('layouts._main')
@section('title','登录')

@section('content')
    <div class="form_box">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">登录</div>
                    <div class="card-body">
                        <form action="" method="">

                            <div class="form-group">
                                <label>邮箱：</label>
                                <input type="text" name="email" class="form-control" value=""/>
                            </div>

                            <div class="form-group">
                                <label>密码：</label>
                                <input type="password" name="password" class="form-control" value=""/>
                            </div>

                            <button type="submit" class="btn btn-primary">登录</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop