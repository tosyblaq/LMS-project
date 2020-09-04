@extends('layouts.admin_inc')

@section('title')
  {{'Courses'}}
@endsection

@section('content')
{{-- Add courses --}}
<div>
    <a href="{{route('course.create')}}" class="btn btn-success float-right mr-5">Add Course</a>
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Courses</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th style="width:30%;">Course Name</th>
                  <th style="width:10%;">Video Episode</th>
                  <th style="width:14%;">episode Title</th>
                  <th style="width:12%;">section</th>
                  <th style="width:18%;">free episode</th>
                  <th style="width:3%;">Published</th>
                  <th style="width:13%;"></th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                    <td>
                      <a href="" class="font-weight-bold label label-info label-many"></a>
                    </td>
                    <td class="text-lowercase"></td>
                    <td></td>
    
                    {{-- Course Image --}}
                    <td class="text-center"></td>
    
                    {{-- Intro Video --}}
                    <td class="text-center"></td>
    
                    <td class="text-center"></td>
    
                    {{-- Controls --}}
                    <td class="text-center">
                      <a href="{{route('course.publish')}}" class="btn btn-success btn-sm">Update</a> 
                    </td>
                </tr>
              </tbody>
            @endforeach
          </table>
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
