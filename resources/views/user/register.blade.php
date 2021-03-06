@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="form-group col-md-9 col-md-offset-1">
                <h2>注册</h2>
            </div>
            <form action="{{url('user/store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group col-md-9 col-md-offset-1">
                    <label for="email">邮箱：</label>
                    <input type="text" class="form-control" name="email"  placeholder="请输入邮箱" required>
                </div>
                <div class="form-group col-md-9 col-md-offset-1">
                    <label for="name">用户名：</label>
                    <input type="text" class="form-control" name="name"  placeholder="请输入用户名" required>
                </div>
                <div class="form-group col-md-9 col-md-offset-1">
                    <label for="password">密码：</label>
                    <input type="password" class="form-control" name="password" placeholder="请输入密码" required>
                </div>
                <div class="form-group col-md-9 col-md-offset-1">
                    <label for="password_confirmation">确认密码：</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="确认密码" required>
                </div>
                <div class="form-group col-md-9 col-md-offset-1">
                    <input type="submit" class="form-control btn-success" value="立即注册">
                </div>
            </form>
        </div>
        @include('errors.common')
    </div>
@endsection