@extends('layouts._main')
@section('title','用户中心')

@section('content')
    @foreach($users as $user)
        <div class="row justify-content-center">
            <div class="row col-md-8 usercenter_box">
                <div class="col-md-2 usercenter_avatar">
                    <img src="{{ $user->gravatar('80') }}"/>
                </div>
                <div class="col-md-7 usercenter_username">
                    {{ $user->name }}
                </div>
                @can('destroy',$user)
                <div class="col-md-3 usercenter_delete">
                    <a href="#">
                        <form action="{{ route('users.destroy',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </a>
                </div>
                @endcan
            </div>
        </div>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-md-3">
            {!! $users->render() !!}
        </div>
    </div>
@stop