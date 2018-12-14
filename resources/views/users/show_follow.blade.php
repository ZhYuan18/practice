@extends('layouts._main')
@section('title',"{{ $title }}")

@section('content')
    @foreach($users as $user)
        <div class="row justify-content-center">
            <div class="row col-md-8 usercenter_box">
                <div class="col-md-2 usercenter_avatar">
                    <img src="{{ $user->gravatar('80') }}"/>
                </div>
                <div class="col-md-7 usercenter_username">
                    <a href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-md-3">
            {!! $users->render() !!}
        </div>
    </div>
@stop