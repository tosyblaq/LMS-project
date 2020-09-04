@extends('layouts.admin_inc')

@section('title')
{{'Create Course'}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-info">
        <h5 class="card-title">Create Course</h5>
            <p class="card-course"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table class="table">
            <form action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Course Title</label>
                    <input type="text" name="title" value="" id="title" class="form-control @error('title') is-invalid @enderror">
                    <label>(For example complete node js master course)</label>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Category --}}
                <div class="form-group mt-3">
                    <label class="font-weight-bold" for="id_label_single">Select a Category</label>
                    <select name="category" id="id_label_single" class="js-example-basic-single js-states form-control">
                      <option value="">Select a category</option>
                      @foreach ($categories as $category)
                        <option class="text-capitalize" value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                </div>

                {{-- Description --}}
                <div class="form-group mt-3">
                  <label class="font-weight-bold" for="description">Course Description</label>
                  {{-- <textarea name="description" id="description" cols="6" rows="6" class="form-control">{{$course->description}}</textarea> --}}
                  <input type="hidden" name="description"  id="content" class="form-control @error('content') is-invalid @enderror" required>
                  <trix-editor input="content"></trix-editor>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                {{-- Image --}}
                <div class="mt-3">
                  <label class="font-weight-bold" for="image">Course Image</label>
                  <input type="file" name="course_image" value="{{old('course_image')}}" class="form-control ">
                </div>

                {{-- Course Video --}}
                <div class="mt-3">
                  <label class="font-weight-bold" for="image">Course Introduction Video</label>
                  <input type="file" name="intro_video" value="{{old('intro_video')}}" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
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
    </script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection