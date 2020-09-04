@extends('layouts.admin_inc')

@section('title')
  {{'Courses'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  {{-- <div>
      <a href="{{route('section.create')}}" class="btn btn-success">Add Section</a>
  </div> --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Lessons Section</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body">
          <table id="course" class="table text-center text-capitalize table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th>ID</th>
                  <th>Section</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($sections as $section)
              <tr>
                <td>{{$section->id}}</td>
                <td class="text-lowercase label label-info label-many">{{$section->section}}</td>
                <td><a href="{{route('section.edit', $section->id)}}" class="btn btn-info fa fa-edit">Edit</a></td>
              </tr>
              @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection