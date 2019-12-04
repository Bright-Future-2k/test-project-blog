@extends('profile-homepage')

@section('title','Danh sach profile')

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-primary" href="{{ route('profiles.create') }}">Create</a>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

            <div class="card-body">
                <h1 class="card-title">Your profile</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $key => $profile)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{$profile->name}}</td>
                            <td>{{$profile->phone}}</td>
                            <td>{{$profile->gender}}</td>
                            <td>{{$profile->address}}</td>
                            <td>{{$profile->birthday}}</td>
                            <td>
                                @if($profile->image)
                                    <img src="{{ asset('storage/'.$profile->image) }}" alt=""
                                         style="width: 200px; height: 200px">
                                @else
                                    {{'Chưa có ảnh'}}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-outline-warning"
                                   href="{{route('profiles.edit',$profile->id)}}">Edit</a>
                            </td>
                            <td><a class=" btn btn-outline-danger" href="{{ route('profiles.destroy',$profile->id) }}"
                                   onclick="confirm('Ban co muon xoa'); return false;">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection
