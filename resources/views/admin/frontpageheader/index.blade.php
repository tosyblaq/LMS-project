@extends('layouts.admin_inc')

@section('title')
  {{'Front Page Header Section'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Front Page Header</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table class="table text-capitalize table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Header Quote</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($headers as $header)
              <tr>
                <td class="text-center">{{$header->id}}</td>
                <td class="label label-info label-many">{{$header->title}}</td>
                <td><button data-toggle="modal" data-target="#changeQuote" class="btn btn-primary">Change Quote</button></td>
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
  <form action="{{route('frontpage.update', $header->id)}}" method="post" id="changeQuoteForm">
    @csrf
    @method('PUT')
    
    <div id="changeQuote" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title pb-3">Change Header Quote</h4>
            </div>
            <div class="modal-body">
              <table class="table text-capitalize table-hover table-striped table-bordered">
                <thead class="bg-info">
                  <tr>
                    <th>Header Quote</th>
                  </tr>
                </thead>
                <tr class="form-group">
                  <td class="label label-info label-many"><input type="text" name="title" class="form-control" value="{{$header->title}}"></td>
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

