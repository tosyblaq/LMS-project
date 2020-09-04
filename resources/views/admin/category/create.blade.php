@extends('layouts.admin_inc')

@section('title')
{{isset($category) ? 'Edit Category' : 'Create Category'}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
        <h5 class="card-title">{{isset($category) ? 'Edit Category' : 'Create Category'}}</h5>
            <p class="card-category"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table class="table">
            <form action="{{isset($category) ? route('category.update', $category->id) : route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="category">Name of Category:</label>
                    <input type="text" name="name" value="{{isset($category) ? $category->name : ''}}" id="category" class="form-control @error('name') is-invalid @enderror">
                    <label>For example Graphic</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Category Image --}}
                @if(isset($category))
                <div>
                  <img src="{{asset('/storage/'.$category->image)}}" alt="{{$category->title}}" style="width: 100%;">
                </div>
                @endif
                <div class="mb-3">
                    <label for="category">Upload Image:</label>
                    <input type="file" name="image" value="{{isset($category) ? $category->image : ''}}" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Description --}}
                <div class="mb-3 form-group">
                    <label for="category">Brief Description:</label>
                    <textarea name="description" id="description" cols="6" rows="6" class="form-control @error('description') is-invalid @enderror">{{isset($category) ? $category->description : ''}}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Price --}}
                <div class="form-group">
                    <label for="price">Price (in naira):</label>
                    <input type="number" name="price" value="{{isset($category) ? $category->price : ''}}" id="category" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-success">{{isset($category) ? 'Update' : 'Create'}}</button>
                </div>
            </form>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

