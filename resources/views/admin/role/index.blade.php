@extends('layouts.admin_inc')

@section('title')
  {{'Courses'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-7">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Roles</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Roles</th>
                </tr>
              </thead>
              @foreach ($roles as $role)
              <tr>
                <td class="text-center">{{$role->id}}</td>
                <td class="label label-info label-many">{{$role->role}}</td>
              </tr>
              @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

