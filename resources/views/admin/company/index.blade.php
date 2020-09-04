@extends('layouts.admin_inc')

@section('title')
  {{'Company Details Section'}}
@endsection

@section('content')
{{-- Add courses --}}
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-head bg-info">
          <h5 class="card-title pl-3 pt-3">Company Details Section</h5>
          <p class="card-course"></p>
        </div>
        <div class="card-body ">
          <table class="table table-hover table-striped table-bordered">
              <thead class="bg-info">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($companies as $company)
              <tr>
                <td class="text-center">{{$company->name}}</td>
                <td class="text-center">{{$company->address}}</td>
                <td class="text-center">{{$company->email}}</td>
                <td class="label label-info label-many">{{$company->phone_number}}</td>
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
  <form action="{{route('company.update', $company->id)}}" method="post" id="changeQuoteForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div id="changeQuote" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-head bg-info">
            <h4 class="modal-title pl-3 pb-3">Edit Company Details</h4>
            </div>
            <div class="modal-body">
              {{-- Tag --}}
              <div class="form-group">
                <label class="font-weight-bold" for="name">Company Name</label>
                <input type="text" name="name" value="{{$company->name}}" class="form-control @error('tag') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Title --}}
              <div class="form-group my-3">
                <label class="font-weight-bold" for="address">Company Address</label>
                <input type="text" name="address" value="{{$company->address}}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group my-3">
                <label class="font-weight-bold" for="email">Company Email</label>
                <input type="text" name="email" value="{{$company->email}}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group my-3">
                <label class="font-weight-bold" for="phone_number">Company Telephone</label>
                <input type="text" name="phone_number" value="{{$company->phone_number}}" class="form-control @error('phone_number') is-invalid @enderror">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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

