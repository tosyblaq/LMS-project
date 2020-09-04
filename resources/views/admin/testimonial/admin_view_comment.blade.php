@extends('layouts.admin_inc')

@section('title')
{{'Course Comments'}}
@endsection

@section('content')
<div class="content my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Course Comments</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered text-center">
              <thead class="bg-info">
                <tr>
                    <th>Image</th>
                    <th style="width:20%;">Student Name</th>
                    <th style="width:20%;">Course</th>
                    <th style="width:40%;">Comment</th>
                    <th style="width:3%;">Published</th>
                    <th style="width:15%;"></th>
                </tr>
              </thead>
              @foreach ($comments as $comment)
              <tr>
                  <td><img src="{{asset('/storage/'.$comment->user->image)}}" alt="{{$comment->user->firstname}}" width="100%"; height="50px;"></td>

                  <td>{{$comment->user->firstname}} {{$comment->user->lastname}}</td>

                  <td>{{$comment->course->title}}</td>

                  <td class="text-center font-weight-bold" style="color: #000 !important;"><p>{{$comment->comment}}</p></td>

                  {{-- Published and Not Published --}}
                  <td class="text-center">
                    @if($comment->published == 1)
                        <img src="{{asset('img/check.png')}}" alt="published" width="50px;">
                    @else
                      <img src="{{asset('img/cancel.png')}}" alt="not published" width="25px;">
                    @endif
                  </td>
  
                  {{-- Buttons --}}
                  <td>
                    @if($comment->published == 0)
                    <a href="{{route('admin_view_comment.publish', $comment->id)}}" class="btn btn-success btn-sm" title="publish this comment">Publish</a> 
                    @endif
                    @if($comment->published == 1)
                    <a href="{{route('admin_view_comment.unpublish', $comment->id)}}" class="btn btn-warning btn-sm" title="unpublish this comment">Unpublish</a> 
                    @endif
                    
                    <form action="{{route('admin_view_comment.deleteComment', $comment->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                        <div class="my-1">
                          <button type="submit" class="btn btn-danger btn-sm fa fa-times" title="delete this comment"></button>
                        </div>
                    </form>
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

@section('scripts')
    <script>
    $(document).ready(function(){
        $('#id_label_single').select2();
    });
      $(document).ready(function(){
        $('#id_label').select2();
    });
    </script>
    
@endsection
