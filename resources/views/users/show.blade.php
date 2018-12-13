@extends('layouts._main')
@section('title','用户中心')

@section('content')
    <div class="row user_content_box">
        <div class="col-md-9">
            <div class="send_box">
                @include('shared._error')
                <form action="{{ route('statuses.store') }}" method="post">
                    {{ csrf_field() }}
                    <textarea name="content" class="col-md-12" rows="4" placeholder="聊聊新鲜事儿...">{{ old('content') }}</textarea>
                    <button type="submit" class="btn btn-primary send_btn">发布</button>
                </form>
            </div>
            <div class="info_box">
                <h2 class="info_header_title">动态列表</h2>
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
        <div class="col-md-3">
            <div class="users_centerbox">
                <div class="avatar_box">
                    <img src="{{ $user->gravatar('80') }}" class="gravatar"/>
                </div>
                <h2 class="username">{{ $user->name }}</h2>
                <div class="active_box">
                    <div class="row justify-content-between">
                        <div class="">
                            <h2>49</h2>
                            <p>关注</p>
                        </div>
                        <div class="">
                            <h2>49</h2>
                            <p>粉丝</p>
                        </div>
                        <div class="">
                            <h2>49</h2>
                            <p>微博</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop