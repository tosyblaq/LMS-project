@extends('layouts.admin_inc')

@section('title')
  {{'Second Paragraph Section'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-head bg-info">
          <h5 class="card-title pl-3 pt-3">Second Paragraph Section</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table class="table table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Tag</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Image</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($secondparas as $secondpara)
              <tr>
                <td class="text-center">{{$secondpara->id}}</td>
                <td class="text-center">{{$secondpara->tag}}</td>
                <td class="text-center">{{$secondpara->title}}</td>
                <td class="label label-info label-many">{{$secondpara->body}}</td>
                <td class="text-center"><img src="{{asset('/storage/'.$secondpara->image)}}" alt="{{$secondpara->title}}" style="height:90px; width:500px"></td>
                <td><button data-toggle="modal" data-target="#changeQuote" class="btn btn-primary">Change</button></td>
              </tr>
              @endforeach
          </table>
        </div>
        <div class="card-footer ">
          
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <form action="{{route('secondpara.update', $secondpara->id)}}" method="post" id="changeQuoteForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div id="changeQuote" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-head bg-info">
            <h4 class="modal-title pl-3 pb-3">Edit Second Paragraph</h4>
            </div>
            <div class="modal-body">
              {{-- Tag --}}
              <div class="form-group">
                <label class="font-weight-bold" for="title">Tag</label>
                <input type="text" name="tag" value="{{$secondpara->tag}}" class="form-control @error('tag') is-invalid @enderror">
                @error('tag')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Title --}}
              <div class="form-group my-3">
                <label class="font-weight-bold" for="title">Title</label>
                <input type="text" name="title" value="{{$secondpara->title}}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Body --}}
              <div class="form-group">
                <label class="font-weight-bold" for="title">Body</label>
                <textarea name="body" id="" cols="30" rows="30" class="form-control">{{$secondpara->body}}</textarea>
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="my-3">
                <img src="{{asset('/storage/'.$secondpara->image)}}" alt="{{$secondpara->title}}" width="100%">
              </div>
              <div>
                <label class="font-weight-bold" for="title">Change Image</label>
                <input type="file" class="form-control" name="image" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    
        </div>
    </div>
</form>


</div>
@endsection

