@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-8 blog-main">

                <div class="blog-post">
                    <h1 class="blog-post-title">{{$discussion->title}}</h1>
                    @if(Auth::id()===$discussion->user_id)
                        <a href="{{url('discussion/'.$discussion->id.'/edit')}}" class="btn btn-danger pull-right">更新帖子</a>
                    @endif
                    <p class="blog-post-meta">{{\Carbon\Carbon::parse($discussion->created_at)->diffForHumans()}}&nbsp;by
                        <a href="#">{{$discussion->user->name}}</a></p>
                    <hr>
                    <h3>正文</h3>

                </div><!-- /.blog-post -->
                <div class="blog-post">

                    <p>{{$discussion->content}}</p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <nav>
                    <ul class="pager">
                        <li><a href="{{url('discussion/'.($discussion->id-1))}}">Previous</a></li>
                        <li><a href="{{url('discussion/'.($discussion->id+1))}}">Next</a></li>
                    </ul>
                </nav>
                @include('comment.show')
                @include('comment.add')



            </div><!-- /.blog-main -->


            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @include('layouts.about')
                @include('layouts.archive')
                @include('layouts.elsewhere')
            </div><!-- /.blog-sidebar -->

        </div>
    </div>
@endsection