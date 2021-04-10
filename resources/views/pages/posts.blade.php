@extends('layouts.base.master')
@section('content')
<div class="row justify-content-end">
    <a class="btn btn-success m-2" href="/post/create" role="button">Create Post</a>
</div>
<div class="row" id="posts">

    <div class="card w-75 m-2">
        <div class="card-body">
            <h5 class="card-title">Post title</h5>
            <p class="card-text">Post text...</p>
            <a href="#" class="btn btn-primary">Open</a>
            <div class="col-md-12 mb-3 mr-5 text-right">
                <button class="btn">
                    <i class="fas fa-thumbs-up"></i>
                </button>
                <p class="ml-1 d-inline text-right">261</p>
            </div>
            <p class="text-right h6"> Created: 2021-02-11</p>
        </div>
    </div>
</div>
@endsection
