@extends('layouts._main')
@section('title','用户中心')

@section('content')
    <div class="row user_content_box">
        <div class="col-md-9">
            <div class="send_box">
                <form action="" method="post">
                    <textarea class="col-md-12" rows="4" placeholder="聊聊新鲜事儿..."></textarea>
                    <button type="submit" class="btn btn-primary send_btn">发布</button>
                </form>
            </div>
            <div class="info_box">
                <h2 class="info_header_title">动态列表</h2>
                <div class="info_list_box">
                    <div class="row info_list_row">
                        <div class="col-md-2 info_list_img">
                            <img class="list_avatar align-self-center" src="{{ $user->gravatar('80') }}"/>
                        </div>
                        <div class="col-md-10">
                            <div class="row justify-content-between">
                                <div class="">
                                    <a href="">{{ $user->name }}</a>
                                    <p>5年前</p>
                                </div>
                                <div class="">
                                    <a href="#" class="btn btn-danger">删除</a>
                                </div>
                            </div>
                            <div>
                                改革开放是坚持和发展中国特色社会主义的必由之路为主题，全景式回顾改革开放40年历程，以风云激荡的感人故事，铺陈出一部国家民族砥砺奋进的壮丽史诗，深刻揭示中国特色社会主义是建立在我们党长期奋斗基础上，是由我们党带领人民历经千辛万苦、付出各种代价、接力探索取得的，响亮回答改革开放是决定当代中国命运的关键一招，也是决定实现“两个一百年”奋斗目标、实现中华民族伟大复兴的关键一招。
                            </div>
                        </div>
                    </div>
                    <div class="row info_list_row">
                        <div class="col-md-2">
                            <img class="list_avatar" src="{{ $user->gravatar('80') }}"/>
                        </div>
                        <div class="col-md-10">
                            <div class="row justify-content-between">
                                <div class="">
                                    <a href="">{{ $user->name }}</a>
                                    <p>5年前</p>
                                </div>
                                <div class="">
                                    <a href="#" class="btn btn-danger">删除</a>
                                </div>
                            </div>
                            <div>
                                改革开放是坚持和发展中国特色社会主义的必由之路为主题，全景式回顾改革开放40年历程，以风云激荡的感人故事，铺陈出一部国家民族砥砺奋进的壮丽史诗，深刻揭示中国特色社会主义是建立在我们党长期奋斗基础上，是由我们党带领人民历经千辛万苦、付出各种代价、接力探索取得的，响亮回答改革开放是决定当代中国命运的关键一招，也是决定实现“两个一百年”奋斗目标、实现中华民族伟大复兴的关键一招。
                            </div>
                        </div>
                    </div>
                    <div class="row info_list_row">
                        <div class="col-md-2">
                            <img class="list_avatar" src="{{ $user->gravatar('80') }}"/>
                        </div>
                        <div class="col-md-10">
                            <div class="row justify-content-between">
                                <div class="">
                                    <a href="">{{ $user->name }}</a>
                                    <p>5年前</p>
                                </div>
                                <div class="">
                                    <a href="#" class="btn btn-danger">删除</a>
                                </div>
                            </div>
                            <div>
                                改革开放是坚持和发展中国特色社会主义的必由之路为主题，全景式回顾改革开放40年历程，以风云激荡的感人故事，铺陈出一部国家民族砥砺奋进的壮丽史诗，深刻揭示中国特色社会主义是建立在我们党长期奋斗基础上，是由我们党带领人民历经千辛万苦、付出各种代价、接力探索取得的，响亮回答改革开放是决定当代中国命运的关键一招，也是决定实现“两个一百年”奋斗目标、实现中华民族伟大复兴的关键一招。
                            </div>
                        </div>
                    </div>
                    <div class="row info_list_row">
                        <div class="col-md-2">
                            <img class="list_avatar" src="{{ $user->gravatar('80') }}"/>
                        </div>
                        <div class="col-md-10">
                            <div class="row justify-content-between">
                                <div class="">
                                    <a href="">{{ $user->name }}</a>
                                    <p>5年前</p>
                                </div>
                                <div class="">
                                    <a href="#" class="btn btn-danger">删除</a>
                                </div>
                            </div>
                            <div>
                                改革开放是坚持和发展中国特色社会主义的必由之路为主题，全景式回顾改革开放40年历程，以风云激荡的感人故事，铺陈出一部国家民族砥砺奋进的壮丽史诗，深刻揭示中国特色社会主义是建立在我们党长期奋斗基础上，是由我们党带领人民历经千辛万苦、付出各种代价、接力探索取得的，响亮回答改革开放是决定当代中国命运的关键一招，也是决定实现“两个一百年”奋斗目标、实现中华民族伟大复兴的关键一招。
                            </div>
                        </div>
                    </div>
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