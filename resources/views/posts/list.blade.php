@extends('profile-homepage')

@section('title','Danh sach post')

@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-primary">Create</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Tag</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Author</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)

        @endforeach
        @foreach($posts as $key => $post)
        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->tag}}</td>
            <td>{{$post->status}}</td>
            <td>
                @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" alt=""
                         style="width: 200px; height: 200px">
                @else
                    {{'Chưa có ảnh'}}
                @endif
            </td>
            <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-primary">Edit</a></td>
            <td><a href="{{route('posts.destroy', $post->id)}}" class="btn btn-outline-danger" onclick="confirm('Ban co muon xoa')">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
