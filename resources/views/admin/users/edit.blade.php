@extends('layouts.admin_inc')

@section('title')
{{e($user->username)}}{{' Page'}}
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
            <p class="description">
              {{'@'}}{{e($user->username)}}
            </p>
          </div>
          <p class="description text-center">
            {{e($user->about)}}
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Edit Profile</h5>
        </div>
        <div class="card-body">
        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label>Company (disabled)</label>
                <input type="text" class="form-control" disabled="" value="{{e($user->company)}}">
              </div>
            </div>
            <div class="col-md-3 px-1">
              <div class="form-group">
                <label>Username</label>
              <input type="text" class="form-control" name="username" value="{{e($user->username)}}">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="{{e($user->email)}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" value="{{e($user->firstname)}}">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{e($user->lastname)}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Home Address" value="{{e($user->address)}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="City" value="{{e($user->city)}}">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" name="country" placeholder="Country" value="{{e($user->country)}}">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Postal Code</label>
                <input type="number" class="form-control" name="postal_code" placeholder="ZIP Code" value="{{e($user->postal_code)}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>About Me</label>
                <textarea class="form-control textarea" name="about">{{e($user->about)}}</textarea>
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
              <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection