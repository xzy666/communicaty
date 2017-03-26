<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Communicaty</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('discussion')}}">首页</a></li>
                <li><a href="#about">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(\Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{\Auth::user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">个人设置</a></li>
                            <li><a href="#">修改头像</a></li>

                            <li role="separator" class="divider"></li>

                            <li><a href="{{url('user/logout')}}">退出登录</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{url('user/login')}}">登录</a></li>
                    <li><a href="{{url('user/register')}}">注册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
    <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>xizy's communicaty</h1>
            <p>欢迎来到耀耀社区！
                @if(Auth::check())
                    <a class="btn btn-lg btn-danger pull-right" href="{{url('/discussion/create')}}" role="button">发表文章</a>
            </p>
            @endif
        </div>

    </div>
    {{--@include('layouts.timeline')--}}
    @yield('content')
</nav>

</body>
</html>