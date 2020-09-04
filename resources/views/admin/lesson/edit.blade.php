@extends('layouts.admin_inc')

@section('title')

@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-info">
        <h5 class="card-title text-light text-capitalize font-weight-bold">Edit <span class="text-secondary">{{$lesson->course->title}}</span></h5>
            <p class="card-lesson"></p>
        </div>
        <div class="card-body ">
          <table class="table">
            <form action="{{route('lesson.update', $lesson->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Episode Title</label>
                    <input type="text" name="title" 
                    value="{{isset($lesson->title) ? $lesson->title : ''}}" 
                    id="title" class="form-control @error('title') is-invalid @enderror">

                    <label>(For example complete node js master lesson)</label>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- Section --}}
                <div>
                  <label for="section" class="font-weight-bold">Section</label>
                  <select name="section" id="id_label_single" class="js-example-basic-single js-states form-control" required>
                    @foreach ($sections as $section)
                    {{-- @if(isset($section->section)) --}}
                    <option value="{{$section->id}}" 
                      @if(isset($lesson))
                          @if($section->id == $lesson->section->id)
                              selected
                          @endif
                      @endif>{{$section->section}}</option>
                    {{-- @endif --}}
                    @endforeach 
                  </select>
                </div>

                {{-- lesson Video --}}
                <div class="my-3">
                    <video src="{{asset('/storage/'.$lesson->video_episode)}}" width="100%;" controls controlsList='nodownload'></video>
                </div>
                <div class="mt-3">
                  <label class="font-weight-bold" for="episode_video">Change lesson Introduction Video</label>
                  <input type="file" name="video_episode" value="{{$lesson->video_episode}}" class="form-control">
                  @error('episode_video')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                {{-- Free Episode --}}
                <div class="form-group mt-3">
                  <label for="free_episode" class="font-weight-bold">Free episode</label>
                  <input type="checkbox" name="free_episode" id="free_episode" 
                  @if($lesson->free_episode)
                      checked
                  @endif>
                </div>

                {{-- Published --}}
                <div class="form-group mt-3">
                  <label for="published" class="font-weight-bold">Published</label>
                  <input type="checkbox" name="published" id="published" 
                  @if($lesson->published)
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
    <script>
      $(document).ready(function(){
        $('#id_label_single').select2();
    });
      $(document).ready(function(){
        $('#id_label').select2();
    });
    
    
    </script>
    
@endsection