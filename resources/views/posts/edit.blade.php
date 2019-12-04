@extends('profile-homepage')

@section('title','Them moi post')

@section('content')
<h2>Edit Post</h2>
    <form method="post" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$post -> title}}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content">{{$post -> content}}</textarea>
        </div>
        <div class="form-group">
            <label>Tag</label>
            <input type="text" class="form-control" name="tag" value="{{ $post ->tag }}">
        </div>
        <div class="form-group">
            <label>Status:</label>
            <br>
            <input type="radio" name="status"
                   @if($post->status == "watching")
                   checked
                   @endif value="watching">Watching<br>
            <input type="radio" name="status"
                   @if($post->status == "watched")
                   checked
                   @endif value="watched">Watched<br>
        </div>
{{--        <div>--}}
{{--            <label>Author</label>--}}
{{--            <select class="form-control" name="user_id">--}}
{{--                @foreach($users as $user)--}}
{{--                    <option @if($post->user_id == $user->id)--}}
{{--                            selected value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                    @else--}}
{{--                        <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn-outline-secondary" href="{{route('posts.list')}}">Cancel</a>
    </form>
@endsection
