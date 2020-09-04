@extends('layouts.admin_inc')

@section('title')
  {{'Get Started Section'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-head bg-info">
          <h5 class="card-title pl-3 pt-3">Get Started Section</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table class="table table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Title</th>
                  <th>Get Started Quote</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($gets as $get)
              <tr>
                <td class="text-center">{{$get->id}}</td>
                <td class="text-center">{{$get->title}}</td>
                <td class="label label-info label-many">{{$get->body}}</td>
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
  <form action="{{route('getstarted.update', $get->id)}}" method="post" id="changeQuoteForm">
    @csrf
    @method('PUT')
    
    <div id="changeQuote" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-head bg-info">
            <h4 class="modal-title pl-3 pb-3">Change Get Started Quote</h4>
            </div>
            <div class="modal-body">
              <table class="table text-capitalize table-hover table-striped table-bordered">
                  <thead class="bg-info">
                    <tr>
                      <th>Title</th>
                      <th>Get Started Quote</th>
                    </tr>
                  </thead>
                  <tr class="form-group">
                    <td class="label label-info label-many" width="30%"><input type="text" name="title" class="form-control" value="{{$get->title}}"></td>
                    <td><textarea name="body" cols="30" rows="30" class="form-control">{{$get->body}}</textarea></td>
                  </tr>
              </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update Quote</button>
            </div>
        </div>
    
        </div>
    </div>
</form>


</div>
@endsection

