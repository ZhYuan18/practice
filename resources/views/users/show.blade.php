@extends('layouts._main')
@section('title','用户中心')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('shared._userinfo')
        </div>
    </div>
    <h2 class="info_header_title">{{ $user->name }} 的动态</h2>
    @if(count($statuses)>0)
        @foreach($statuses as $status)
            <div class="row userinfo_status_box">
                <div class="col-md-1">
                    <img class="list_avatar" src="{{ $user->gravatar('80') }}"/>
                </div>
                <div class="col-md-11">
                    <div class="row justify-content-between">
                        <div class="ml-3">
                            <div class="userinfo_status_username">{{ $user->name }}</div>
                            <div class="userinfo_status_created">{{ $status->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="mr-3">
                            @can('destroy',$status)
                            <a href="">
                                <form action="{{ route('statuses.destroy',$status->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div>{{ $status->content }}</div>
                </div>
            </div>
        @endforeach
        <div class="userinfo_status_page">
            {!! $statuses->render() !!}
        </div>
    @endif
@stop