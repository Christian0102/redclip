@extends('layouts.base.master')
@section('content')
<div class="row justify-content-end">
    <a class="btn btn-success m-2" href="{{route('post.create')}}" role="button">Create Post</a>
</div>
<div class="row" id="posts">
    @foreach($posts as $post)
    <div class="card w-75 m-2">
        <div class="card-body">
            <a href="/post/show/{{$post->id}}" class="text-dark">
                <h4 class="card-title">{{$post->title}}</h4>
            </a>
            <p class="card-text">{!!$post->text!!}</p>

            <div class="col-md-12 mb-3 mr-5 text-right">
                <button class="btn" id="votepost{{$post->id}}" value="{{$post->id}}" onClick="vote(this)">
                    <i class="fas fa-thumbs-up"></i>
                </button>
                <p class="ml-1 d-inline text-right" id="votes{{$post->id}}">{{$post->votes}}</p>
            </div>
            <p class="text-right h6 text-danger">Posted date: {{$post->created_at}}</p>
        </div>
    </div>
    @endforeach
</div>
<script>
    function vote(element) {
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
                const votes = $("#votes" + id)
                let number = parseInt(votes.text());
                votes.text(number + 1)
            }
        })

    }
</script>
@endsection