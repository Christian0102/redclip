@extends('layouts.base.master')
@section('content')
<div class="row justify-content-end">
    <a class="btn btn-success m-2" href="{{route('post.create')}}" role="button">Create Post</a>
</div>
<div class="row" id="posts">

    @foreach($posts as $post)
    <div class="card w-75 m-2">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{!!$post->text!!}</p>
            <a href="#" class="btn btn-primary">Open</a>
            <div class="col-md-12 mb-3 mr-5 text-right">
                <button class="btn">
                    <i class="fas fa-thumbs-up"></i>
                </button>
                <p class="ml-1 d-inline text-right">{{$post->votes}}</p>
            </div>
            <p class="text-right h6">{{$post->created_at}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
