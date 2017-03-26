@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-9">
            <div class="row" role="main">
                @foreach($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="{{$discussion->user->avatar}}" alt="64×64"
                                     style="width: 60px;height: 60px">
                            </a>
                        </div>
                        <h4 class="media-body">
                            <a href="{{url('/discussion/'.$discussion->id)}}">{{$discussion->title}}</a>
                            <div class="pull-right">回复数</div>
                        </h4>
                        <div class="media-heading">
                            {{$discussion->content}}

                        </div>


                    </div>
                    <br>
                    <br>
                    <br>
                @endforeach
                {{$discussions->render()}}
            </div>
        </div>
        <div class="col-md-2 col-lg-offset-1">
            @include('layouts.about')
            <hr>
            @include('layouts.archive')
            <hr>
            @include('layouts.elsewhere')

        </div>
    </div>
@endsection