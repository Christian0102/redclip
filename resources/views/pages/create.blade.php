@extends('layouts.base.master')
@section('content')
<div class="container mt-4">
    <div class="col-md-10">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Post title....">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="content" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        CKEDITOR.replace( 'content' );
    })

</script>
@endsection
