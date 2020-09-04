@extends('layouts.admin_inc')

@section('title')
    {{'View Course Lessons'}}
@endsection

@section('content')
<div class="content my-1">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header bg-info">
            <h5 class="card-title">Video Episode Uploaded for a Course</h5>
            <p class="card-course"></p>
          </div>
          <div class="card-body ">
            {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
            
            <table id="course" class="table text-capitalize table-hover table-striped table-bordered text-center">
                <thead class="bg-info">
                  <tr>
                    <th style="width:30%;">Course Name</th>
                    <th style="width:12%;">section</th>
                    <th style="width:10%;">Episode title</th>
                    <th style="width:14%;">Episode videos</th>
                    <th style="width:18%;">free</th>
                    <th style="width:3%;">Published</th>
                    <th style="width:13%;"></th>
                  </tr>
                </thead>
                @foreach ($lessons as $lesson)
                  <tr>
                    <td class="text-center" style="width:20%">
                      <a href="" class="font-weight-bold label label-info label-many">{{$lesson->course->title}}</a>
                    </td>
                    
                    <td class="text-center">{{$lesson->section_id}}</td>

                    {{-- Episode Title --}}
                    <td class="text-center">{{$lesson->title}}</td>
    
                    <td style="width:20%" class="text-center"><video src="{{asset('/storage/'.$lesson->video_episode)}}" style="height:80px;" controls controlsList='nodownload'></video></td>
    
    
                    {{-- Free Episode --}}
                    <td class="text-center">
                      @if($lesson->free_episode == 1)
                        <img src="{{asset('img/check.png')}}" alt="free episode" width="50px;">
                        @else
                        <img src="{{asset('img/cancel.png')}}" alt="episode not free" width="25px;">
                      @endif
                    </td>
    
                    {{-- Published and Not Published --}}
                    <td class="text-center">
                      @if($lesson->published == 1)
                          <img src="{{asset('img/check.png')}}" alt="published" width="50px;">
                      @else
                      <img src="{{asset('img/cancel.png')}}" alt="not published" width="25px;">
                      @endif
                    </td>
    
                    {{-- Buttons --}}
                    <td>
                      @if($lesson->published == 0)
                      <div class="d-flex">
                        <a href="{{route('lesson.publish', $lesson->id)}}" class="btn btn-success btn-sm">Publish</a> 
                        @endif
                        @if($lesson->published == 1)
                          <a href="{{route('lesson.unpublish', $lesson->id)}}" class="btn btn-warning btn-sm">Unpublish</a> 
                        @endif

                        <a href="{{route('lesson.edit', ['id' => $lesson->id])}}" class="btn btn-info btn-sm my-1 fa fa-edit">Edit</a>
                      </div>
    
                      <div class="d-flex my-1">
                        @if($lesson->free_episode == 0)
                          <a href="{{route('lesson.make_free', $lesson->id)}}" id="make_free" class="btn btn-success btn-sm mx-1" title="make this lesson free">Make Free</a>
                        @endif
                        @if($lesson->free_episode == 1)
                          <a href="{{route('lesson.make_not_free', $lesson->id)}}" id="make_free" class="btn btn-dark btn-sm mx-1">Make Not Free</a>
                        @endif
                        
                        <form action="{{route('lesson.destroy', ['id' => $lesson->id])}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button data-id="{{$lesson->id}}" type="submit" class="delete-lesson btn btn-danger btn-sm fa fa-times" title="delete lesson"></button>
                        </form>
  
                      </div>
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