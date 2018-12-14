@extends('layouts._main')
@section('title','首页')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-md-9">
                @include('shared.status_form')
            </div>
            <div class="col-md-3">
                @include('shared._userinfo',['user'=>Auth::user()])
            </div>
        </div>
        <h1>最新动态</h1>
        @foreach($statuses as $status)
            <div class="row index_status__box">
                <div class="media">
                    <img class="align-self-center mr-3 gravatar" src="{{Auth::user()->gravatar()}}" alt="">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="{{ route('users.show',$status->user_id) }}">{{ $status->name }}</a></h5>
                        <h3 class="mt-0 index_status_times">{{ $status->created_at }}</h3>
                        <p>{{ $status->content }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="index_status_page">
            {{ $statuses->links() }}
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Laravel</h1>
            <p class="lead">
                一切，将从这里开始
            </p>
            <p>
                <a href="{{ route('users.create') }}" class="btn btn-primary">现在注册</a>
            </p>
        </div>
    @endif
@stop