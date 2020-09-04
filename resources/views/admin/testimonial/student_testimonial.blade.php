@extends('layouts.admin_inc')

@section('title')
{{'Students Testimonials'}}
@endsection

@section('content')
<div class="content my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Students Testimonials</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered text-center">
              <thead class="bg-info">
                <tr>
                  <th style="width:30%;">Image</th>
                  <th style="width:50%;">Message</th>
                  <th style="width:3%;">Published</th>
                  <th style="width:13%;"></th>
                </tr>
              </thead>
              @foreach ($testimonies as $testimony)
              <tr>
                <td><img class="rounded-circle" src="{{asset('/storage/'.$testimony->user->image)}}" alt="{{$testimony->user->firstname}}" width="30%"; height="70px;"></td>
    
                  <td class="text-center">{{$testimony->body}}</td>

                  {{-- Published and Not Published --}}
                  <td class="text-center">
                    @if($testimony->published == 1)
                        <img src="{{asset('img/check.png')}}" alt="published" width="50px;">
                    @else
                      <img src="{{asset('img/cancel.png')}}" alt="not published" width="25px;">
                    @endif
                  </td>
  
                  {{-- Buttons --}}
                  <td>
                    @if($testimony->published == 0)
                    <a href="{{route('testimonial.publish', $testimony->id)}}" class="btn btn-success btn-sm">Publish</a> 
                    @endif
                    @if($testimony->published == 1)
                    <a href="{{route('testimonial.unpublish', $testimony->id)}}" class="btn btn-warning btn-sm">Unpublish</a> 
                    @endif
                    
                    <form action="{{route('student_testimonial.destroy', $testimony->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                        <div class="my-1">
                          <button type="submit" class="btn btn-danger btn-sm fa fa-times"></button>
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
