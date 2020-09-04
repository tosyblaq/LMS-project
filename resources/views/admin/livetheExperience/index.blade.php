@extends('layouts.admin_inc')

@section('title')
  {{'Live The Experience Section'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-head bg-info">
          <h5 class="card-title pl-3 pt-3">Live The Experience Section</h5>
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
              <tbody>
                @foreach ($lives as $live)
                <tr>
                  <td class="text-center">{{$live->id}}</td>
                  <td class="text-center">{{$live->tag}}</td>
                  <td class="text-center">{{$live->title}}</td>
                  <td>{{$live->body}}</td>
                  <td class="text-center"><img src="{{asset('/storage/'.$live->image)}}" alt="{{$live->title}}" style="height:90px; width:500px"></td>
                  <td><a href="{{route('live.edit', $live->id)}}" class="btn btn-primary">Change</a></td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <div class="card-footer ">
          
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
