@extends('layouts.admin_inc')

@section('title')
  {{'Courses'}}
@endsection

<style>
  /* div{
    visibility:  visible;
    background-image: 
  } */
</style>

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
                  <th style="width:30%;">Course Title</th>
                  <th style="width:10%;">Course Creator</th>
                  <th style="width:14%;">Category</th>
                  <th style="width:12%;">Course Image</th>
                  <th style="width:18%;">Course Intro Video</th>
                  <th style="width:3%;">Published</th>
                  <th style="width:13%;"></th>
                </tr>
              </thead>
              @foreach ($courses as $course)
              <tr>
                <td>
                  <a href="" class="font-weight-bold label label-info label-many">{{$course->title}}</a>
                </td>
                <td class="text-lowercase">{{$course->user->firstname}} {{$course->user->lastname}}</td>
                <td>{{$course->category->name}}</td>

                {{-- Course Image --}}
                <td class="text-center"><img src="{{asset('/storage/'.$course->image)}}" alt="{{$course->title}}" style="height:80px; width: 100px;"></td>

                {{-- Intro Video --}}
                <td class="text-center"><video src="{{asset('/storage/'.$course->intro_video)}}" style="height:80px; width: 150px;" controlsList="nodownload" controls></video></td>

                <td class="text-center" >
                  @if($course->published)
                      <img class="text-center mx-auto" src="{{asset('img/check.png')}}" id="pubImg" alt="Published" width="50px;">
                  @else
                      <img class="text-center mx-auto" src="{{asset('img/cancel.png')}}" id="unpubImg" alt="Not Published" width="25px;">
                  @endif
                  <span id="cancel"></span>
                </td>

                {{-- Controls --}}
                <td class="text-center">
                  @if($course->published == 0)
                  <div><a href="{{route('course.publish', $course->id)}}" class="btn btn-success btn-sm published" id="publish" data-id={{$course->id}}>Publish</a></div>
                  @endif
                  @if($course->published == 1)
                  <div><a href="{{route('course.unpublish', $course->id)}}" class="btn btn-warning btn-sm" id="unpublishOne" data-id={{$course->id}}>Unpublish</a></div>
                  @endif
                  <a href="{{route('course.edit', ['id' => $course->id, 'slug' => $course->slug])}}" class="btn btn-info btn-sm my-1 fa fa-edit">Edit</a>
                  {{-- Add Lesson --}}
                  <a href="{{route('create_lesson', ['id' => $course->id, 'slug' => $course->slug])}}" class="btn btn-info btn-sm my-1 fa fa-edit">Create Lessons</a>
                </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection