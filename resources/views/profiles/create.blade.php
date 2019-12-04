@extends('profile-homepage')

@section('title','Them moi profile')

@section('content')
    <form method="post" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="phone" class="form-control" >
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="male" checked>Male
            <input type="radio" name="gender" value="female">Female
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="form-group">
            <label>Birthday:</label>
            <input type="date" name="birthday" class="form-control">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{ route('profiles.list') }}">Cancel</a>

    </form>
@endsection
