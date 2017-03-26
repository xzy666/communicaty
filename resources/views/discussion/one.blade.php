@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-8 blog-main">

                <div class="blog-post">
                    <h2 class="blog-post-title">{{$discussion->title}}</h2>
                    <p class="blog-post-meta">{{\Carbon\Carbon::parse($discussion->created_at)->diffForHumans()}}&nbsp;by <a href="#">{{$discussion->user->name}}</a></p>
                    <hr>
                    <h2>Heading</h2>

                </div><!-- /.blog-post -->
                <div class="blog-post">

                    <p>{{$discussion->content}}</p>
                </div>

                <nav>
                    <ul class="pager">
                        <li><a href="{{url('discussion/'.($discussion->id-1))}}">Previous</a></li>
                        <li><a href="{{url('discussion/'.($discussion->id+1))}}">Next</a></li>
                    </ul>
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
           @include('discussion.about')
               @include('discussion.archive')
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->

        </div>
    </div>
@endsection