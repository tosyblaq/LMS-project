@extends('layouts.admin_inc')

@section('title')
{{e($user->firstname)}}{{' Page'}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
        <img src="{{asset('img/damir-bosnjak.jpg')}}" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="#">
            <div>
              <img class="avatar border-gray" src="{{asset('/storage/'.$user->image)}}">
            </div>
            <h5 class="title">{{e($user->firstname)}} {{e($user->lastname)}}</h5>
            </a>
            {{-- <p class="description">
              {{'@'}}{{$user->firstname}}
            </p> --}}
          </div>
          <p class="description text-center">
            @if($user->profile)
            {{e($user->profile->about)}}
            @endif
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">User Profile</h5>
        </div>
        <div class="card-body">
        <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12 mx-auto">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="{{e($user->email)}}" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" value="{{e($user->firstname)}}" disabled="">
              </div>
            </div>
            <div class="col-md-6 mx-auto">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{e($user->lastname)}}" disabled="">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Home Address" value="{{isset($user->profile) ? e($user->profile->address) : '' }}">
              </div>
            </div>
          </div> 

          <div class="row">
            <div class="col-md-4 mx-auto">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="City" value="{{isset($user->profile) ? e($user->profile->city) : '' }}">
              </div>
            </div>
            <div class="col-md-4 mx-auto">
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" name="country" placeholder="Country" value="{{isset($user->profile) ? e($user->profile->country) : '' }}">
              </div>
            </div>
            <div class="col-md-4 mx-auto">
              <div class="form-group">
                <label>Postal Code</label>
                <input type="number" class="form-control" name="postal_code" placeholder="ZIP Code" value="{{isset($user->profile) ? e($user->profile->postal_code) : '' }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>About Me</label>
                <textarea class="form-control textarea" name="about">{{isset($user->profile) ? e($user->profile->about) : '' }}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div>
                <label>Change Image</label>
              <input type="file" name="image" class="form-control">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Update user</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection