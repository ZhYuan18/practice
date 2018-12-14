<div class="users_centerbox">
    <div class="avatar_box">
        <img src="{{ $user->gravatar('80') }}" class="gravatar"/>
    </div>
    <h2 class="username">{{ $user->name }}</h2>
    <div class="active_box">
        <div class="row justify-content-between">
            <div class="">
                <h2>{{ count($user->followings) }}</h2>
                <p>关注</p>
            </div>
            <div class="">
                <h2>{{ count($user->followers) }}</h2>
                <p>粉丝</p>
            </div>
            <div class="">
                <h2>{{ $user->statuses()->count() }}</h2>
                <p>动态</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(Auth::check())
                @can('follow',$user)
                    @if(Auth::user()->isFollowing($user->id))
                        <form action="{{ route('followers.destroy',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn" type="submit">取消关注</button>
                        </form>
                    @else
                        <form action="{{ route('followers.store',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-primary" type="submit">关注</button>
                        </form>
                    @endif
                @endcan
            @endif
        </div>
    </div>
</div>