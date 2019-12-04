@extends('profile-homepage')

@section('title','Them moi profile')

@section('content')
    <form method="post" action="{{ route('profiles.update',$profile->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}">
        </div>

        <div class="form-group">
            <label>Gender:</label><br>
            <input type="radio" name="gender"
                   @if($profile->gender == "male")
                   checked
                @endif value="male">Male<br>
            <input type="radio" name="gender"
                   @if($profile->gender == "female")
                   checked
                @endif value="female">Female<br>
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" value="{{ $profile->address }}">
        </div>

        <div class="form-group">
            <label>Birthday:</label>
            <input type="date" name="birthday" class="form-control" value="{{ $profile->birthday }}">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" value="{{ $profile->image }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{ route('profiles.list') }}">Cancel</a>
    </form>
@endsection
