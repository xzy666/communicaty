<div class="form-group">
    <label for="password">评论框：</label>
    <textarea name="content" id="comments" placeholder="对他说点什么吧...." style="width: 800px;height:160px;"></textarea>
</div>
<div class="form-group">
    <div class="container">
        <div class="col-md-7"></div>
        <input type="submit" value="添加评论" class="col-md-1 btn btn-success" onclick="comment()">
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function comment() {
        {{--$.ajax('{{url('/comment')}}', {--}}
            {{--content: $('#comments').value,--}}
            {{--user_id:'{{$discussion->user->id}}',--}}
            {{--discussion_id:'{{$discussion->id}}',--}}
        {{--}, function (data) {--}}
            {{--alert(data.a);--}}
        {{--}, "json");--}}
        $.ajax({
            type: "POST",
            dataType: "json",
            cache: false,
            url: '{{url('/comment')}}',
            data: {
                content: $('#comments').value,
                user_id: '{{$discussion->user->id}}',
                discussion_id: '{{$discussion->id}}',
                _method: "POST"
            },
            success: function (data) {
                    alert(data.msg);
                    location.reload();
            },
            error: function (data) {
                    alert(data.msg);
                    location.reload();
            }
        });
    }
</script>
