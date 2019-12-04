@extends('profile-homepage')

@section('title','Them moi post')

@section('content')
<h2>Create Post</h2>
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content"></textarea>
        </div>
        <div class="form-group">
            <label>Tag</label>
            <input type="text" class="form-control" name="tag">
        </div>
        <div class="form-group">
            <label>Status:</label><br>
            <input type="radio" name="status" value="watching">Watching
            <input type="radio" name="status" value="watched">Watched
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn-outline-secondary" href="{{route('posts.list')}}">Cancel</a>
    </form>
@endsection
