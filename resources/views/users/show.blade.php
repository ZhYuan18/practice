@extends('layouts._main')
@section('title','用户中心')

@section('content')
    <div class="users_centerbox">
        <div class="avatar_box">
            <img src="{{ $user->gravatar() }}" class="gravatar"/>
        </div>
        <h2>{{ $user->name }}</h2>
    </div>
@stop