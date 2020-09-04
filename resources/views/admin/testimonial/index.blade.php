@extends('layouts.admin_inc')

@section('title')
  {{'Testimonials Section'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-head bg-info">
          <h5 class="card-title pl-3 pt-3">Testimonials Section</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table class="table table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Title</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($testimonials as $testimonial)
              <tr>
                <td class="text-center">{{$testimonial->id}}</td>
                <td class="label label-info label-many">{{$testimonial->header}}</td>
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
  <form action="{{route('testimonial.update', $testimonial->id)}}" method="post" id="changeQuoteForm">
    @csrf
    @method('PUT')
    
    <div id="changeQuote" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-head bg-info">
            <h4 class="modal-title pl-3 pb-3">Change Testimonial Header</h4>
            </div>
            <div class="modal-body">
              <table class="table text-capitalize table-hover table-striped table-bordered">
                  <thead class="bg-info">
                    <tr>
                      <th>Title</th>
                    </tr>
                  </thead>
                  <tr class="form-group">
                    <td class="label label-info label-many" width="30%"><input type="text" name="header" class="form-control" value="{{$testimonial->header}}"></td>
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

