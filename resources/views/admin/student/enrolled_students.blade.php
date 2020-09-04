@extends('layouts.admin_inc')

@section('title')
  {{'Enrolled Students'}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Enrolled Students</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th>Student Name</th>
                  <th>Category</th>
                  <th>Fee Paid</th>
                </tr>
              </thead>
              {{-- @foreach ($courses as $course) --}}
              <tr>
                <td class="font-weight-bold label label-info label-many"></td>
                <td></td>
                <td></td>
            </tr>
            {{-- @endforeach --}}
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
