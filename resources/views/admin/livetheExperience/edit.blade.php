@extends('layouts.admin_inc')

@section('title')
{{$live->title}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-info">
        <h5 class="card-title">Edit Live The Experience</h5>
            <p class="card-live"></p>
        </div>
        <div class="card-body ">
          <table class="table">
            <form action="{{route('live.update', $live->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Tag --}}
              <div class="form-group">
                <label class="font-weight-bold" for="title">Tag</label>
                <input type="text" name="tag" value="{{$live->tag}}" class="form-control @error('tag') is-invalid @enderror">
                @error('tag')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Title --}}
              <div class="form-group my-3">
                <label class="font-weight-bold" for="title">Title</label>
                <input type="text" name="title" value="{{$live->title}}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Body --}}
              <div class="form-group">
                <label class="font-weight-bold" for="title">Body</label>
                <textarea name="body" cols="10" rows="12" class="form-control">{{$live->body}}</textarea>
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="my-3">
                <img src="{{asset('/storage/'.$live->image)}}" alt="{{$live->title}}" width="100%">
              </div>
              <div>
                <label class="font-weight-bold" for="image">Change Image</label>
                <input type="file" class="form-control" name="image" class="form-control">
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
