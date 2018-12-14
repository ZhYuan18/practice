@extends('layouts._main')
@section('title','用户中心')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('shared._userinfo')
        </div>
    </div>
    <h2 class="info_header_title">{{ $user->name }}的动态</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="info_box">
                <div class="info_list_box">
                    @if (count($statuses) > 0)
                        @foreach($statuses as $status)
                            <div class="row info_list_row">
                                <div class="col-md-2 info_list_img">
                                    <img class="list_avatar align-self-center" src="{{ $user->gravatar('80') }}"/>
                                </div>
                                <div class="col-md-10">
                                    <div class="row justify-content-between">
                                        <div class="">
                                            <a href="">{{ $user->name }}</a>
                                            <p>{{ $status->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="">
                                            @can('destroy', $status)
                                                <a href="#">
                                                    <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger">删除</button>
                                                    </form>
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div>
                                        {{ $status->content }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop