@extends('layouts.admin_inc')

@section('title')
{{$course->title}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-info">
        <h5 class="card-title">Edit Course</h5>
            <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table class="table">
            <form action="{{route('course.update', $course->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Course Title</label>
                    <input type="text" name="title" value="{{$course->title}}" id="title" class="form-control @error('title') is-invalid @enderror">
                    <label>(For example complete node js master course)</label>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Category --}}
                <div class="form-group mt-3">
                    <label class="font-weight-bold" for="price">Select a Category</label>
                    <select name="category" id="category" class="form-control selectBox">
                      @foreach ($categories as $category)
                        <option class="text-capitalize" value="{{$category->id}}"
                            @if(isset($course))
                                @if($category->id == $course->category->id)
                                    selected
                                @endif
                            @endif
                            >{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                {{-- Description --}}
                <div class="form-group mt-3">
                  <label class="font-weight-bold" for="description">Course Description</label>
                  {{-- <textarea name="description" id="description" cols="6" rows="6" class="form-control">{{$course->description}}</textarea> --}}
                  <input type="hidden" name="description"  id="content" class="form-control @error('content') is-invalid @enderror" value="{{$course->description}}" required>
                  <trix-editor input="content"></trix-editor>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                {{-- Image --}}
                <div>
                    <img src="{{asset('/storage/'.$course->image)}}" alt="{{$course->title}}" style="width: 100%;">
                </div>
                <div class="mt-3">
                  <label class="font-weight-bold" for="image">Change Course Image</label>
                  <input type="file" name="course_image" value="{{$course->image}}" class="form-control">
                  @error('course_image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                {{-- Course Video --}}
                <div class="my-3">
                    <video src="{{asset('/storage/'.$course->intro_video)}}" width="100%;" controlsList="nodownload" controls></video>
                </div>
                <div class="mt-3">
                  <label class="font-weight-bold" for="image">Change Course Introduction Video</label>
                  <input type="file" name="intro_video" value="{{$course->intro_video}}" class="form-control">
                  @error('intro_video')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                {{-- Published --}}
                <div class="form-group mt-3">
                  <label for="published" class="font-weight-bold">Published</label>
                  <input type="checkbox" name="published" id="published" 
                  @if($course->published))
                      checked
                  @endif>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection