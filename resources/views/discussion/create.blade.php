@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <form action="{{url('discussion/createDis')}}" method="post">
                {{csrf_field()}}
                <div class="form-group col-md-9 col-md-offset-1">
                    <label for="email">标题：</label>
                    <input type="text" class="form-control" name="title" placeholder="请输入标题" required>
                </div>

                <div class="form-group col-md-9 col-md-offset-1">
                    <label for="password">帖子内容：</label>
                    <textarea name="content"  style="width: 850px;height: 240px;" placeholder="多少说点什么。。。"></textarea>
                </div>

                <div class="form-group col-md-9 col-md-offset-1">
                    <input type="submit" class="form-control btn-success" value="立即发表">
                </div>
            </form>
        </div>
        @include('errors.common')
        <div class="form-group col-lg-offset-1 col-md-9">
            @if(session()->has('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif
        </div>

    </div>
@endsection