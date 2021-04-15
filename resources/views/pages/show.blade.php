@extends('layouts.base.master')
@section('content')
<div class="row" id="post">
    <div class="card w-100 m-2">
        <div class="card-body">
            <h4 class="card-title text-center">{{$post->title}}</h4>
            <p class="card-text ">{!!$post->text!!}</p>

            <div class="col-md-12 mb-3 mr-5 text-right">
                <button class="btn" id="postvotes{{$post->id}}" value="{{$post->id}}" onClick="postVote(this)">
                    <i class="fas fa-thumbs-up"></i>
                </button>
                <p class="ml-1 d-inline text-right" id="postNumberVote">{{$post->votes}}</p>
            </div>
            <p class="text-right h6 text-danger">Posted date: {{$post->created_at}}</p>
            @foreach($comments as $comment)
            <div class="card w-100 m-1">
                <div class="card-header">
                    User Anonymous
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p></p>
                        {{$comment->text}}
                        <div class="col-md-12 mb-3 mr-5 text-right">
                            <button class="btn" id="votecomment{{$comment->id}}" value="{{$comment->id}}" onClick="commentVote(this)">
                                <i class="fas fa-thumbs-up"></i>
                            </button>
                            <p class="ml-1 d-inline text-right"  id='votes{{$comment->id}}'>{{$comment->votes}}</p>
                        </div>
                        <p class="text-right h6 text-dark pull-right">Reply: {{$comment->created_at}}<cite title="Source Title">
                        </p>
                    </blockquote>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                        <form method="post" action="{{route('comment.store')}}">
                            @csrf
                            <textarea name="text" placeholder="Comment now...."></textarea>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-success green mb-2"><i class="fa fa-share"></i>
                                Reply</button>
                        </form>
                    </div><!-- Status Upload  -->
                </div><!-- Widget Area -->
            </div>

        </div>
    </div>
</div>
<script>
    function commentVote(element) {
        let id = element.value
        let elementId = '#' + element.id;


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const data = {
            id: id,
            _method: "PATCH"
        };
        $.ajax({
            url: '/comment/vote',
            data: JSON.stringify(data),
            type: 'PATCH',
            contentType: 'application/x-www-form-urlencoded',
            processData: false,
            dataType: 'json',
            success: function () {
                let button = $(elementId);
                button.prop("disabled", true);
                const votes = $("#votes" + id)
                let number = parseInt(votes.text());
                console.log(number)
                votes.text(number + 1)
            }
        })

    }

    function postVote(element) {
        let id = element.value
        let elementId = '#' + element.id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const data = {
            id: id,
            _method: "PATCH"
        };
        $.ajax({
            url: '/post/vote',
            data: JSON.stringify(data),
            type: 'PATCH',
            contentType: 'application/x-www-form-urlencoded',
            processData: false,
            dataType: 'json',
            success: function() {
                let button = $(elementId);
                button.prop("disabled", true);
                const postVotes = $("#postNumberVote")
                let number = parseInt(postVotes.text());

                postVotes.text(number + 1)
            }
        })

    }

</script>
@endsection
