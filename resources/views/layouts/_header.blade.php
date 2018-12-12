<header class="header_box">
    <div class="container">
        <nav class="navbar navbar-expand-lg justify-content-between">
            <a class="navbar-brand" href="{{ route('index') }}" id="logo">Laravel</a>
            <ul class="navbar-nav" id="nav_font_color">
                @if(Auth::check())
                    <li class="nav-item"><a class="nav-link" href="">用户列表</a></li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                            {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" id="users_info_box">
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.show',[Auth::user()->id]) }}">个人中心</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.edit',[Auth::user()->id]) }}">编辑资料</a></li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item">
                                <a id="logout" href="#">
                                   <form action="{{ route('logout')}}" method="post">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                       <button type="submit" class="btn btn-sm btn-danger">退出</button>
                                   </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">帮助</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>