<h5>评论区</h5>
@foreach($discussion->comments as $comment)
    <div class="media">
        <div class="media-left">
            <img class="media-object img-circle" src="{{$comment->user->avatar}}" alt="64×64"
                 style="width: 60px;height: 60px">
        </div>
        <h7 class="media-body">
            {{$comment->content}}
        </h7>
        <div class="media-heading">
        </div>
    </div>
    <hr>
@endforeach
{{--{{$discussion->comments->render()}}--}}
