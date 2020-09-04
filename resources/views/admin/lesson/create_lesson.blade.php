@extends('layouts.admin_inc')

@section('title')
{{'Create Lessons'}}
@endsection

@section('content')

<div class="content mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-info">
        <h5 class="card-title">Add Course Section Video <small class="text-warning bg-secondary">(select section and then upload files)</small></h5>
            <p class="card-course"></p>
        </div>
        <div class="card-body ">
            <form action="{{route('lesson.store', ['id' => $course->id])}}" method="post" class="dropzone" enctype="multipart/form-data">
                @csrf
                <select name="section" id="id_label_single" class="js-example-basic-single js-states form-control" required>
                  <option value="">Select a section</option>
                  @foreach ($sections as $section)
                  <option value="{{$section->id}}">{{$section->section}}</option>
                  @endforeach
                </select>
                <input type="hidden" value="{{$course->id}}" name="course_id">

                <div class="form-group my-2">
                  <input type="text" name="section_title" placeholder="Section Title" class="form-control">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <a href="{{route('view_lesson', $course->id)}}" class="btn btn-info">View Lessons</a>
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
