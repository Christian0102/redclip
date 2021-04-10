@extends('layouts.base.master')
@section('content')
<div class="container mt-4">
    <div class="col-md-10">
        <form method="POST" action="{{route('post.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                    placeholder="Post title....">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" name="text" id="content" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger col-md-10 mt-2">
            <p>{{$error}}</p>
        </div>
        @endforeach
        @endif
    </div>
</div>
<script>
    $(document).ready(function () {
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    })

</script>
@endsection
