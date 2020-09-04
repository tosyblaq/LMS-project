@extends('layouts.admin_inc')

@section('title')
  {{'Users'}}
@endsection

@section('content')

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header bg-info">
          <h5 class="card-title">Users</h5>
          <p class="card-user"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          @if($users->count() > 0)
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered text-center">
            <thead class="bg-info">
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>
                  <img src="{{asset('/storage/'.$user->image)}}" style="width: 80px; height: 80px; border-radius:50%;">
                  {{-- <img src="{{}}" 
                  style="width: 80px; height: 80px; border-radius:50%;"> --}}
                </td>
                <td class="text-capitalize">{{e($user->firstname)}} {{e($user->lastname)}}</td>
                <td>{{e($user->email)}}</td>
                <td>{{e($user->role)}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
          @else
          <div>
            <h4 class="text-center">No user Yet</h4>
          </div>
          @endif
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-history"></i> Updated 3 minutes ago
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
