@extends('layouts.admin_inc')

@section('title')
  {{'Categories'}}
@endsection

@section('content')
{{-- Add Categories --}}
<div>
    <a href="{{route('category.create')}}" class="btn btn-success float-right mr-5">Add Category</a>
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h5 class="card-title">Categories</h5>
          <p class="card-category"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table id="course" class="table text-capitalize table-hover table-striped table-bordered text-center">
              <thead class="bg-info">
                <tr>
                  <th>Category Name</th>
                  <th style="width: 10px;">Description</th>
                  <th>Image</th>
                  <th>Courses</th>
                  <th>Price</th>
                  <th></th>
                </tr>
              </thead>
              @foreach ($categories as $category)
              <tbody>
                <tr>
                  <td>
                    <a href="" class="font-weight-bold label label-info label-many">{{$category->name}}</a>
                  </td>
                  <td style="width: 25%;">{{str_limit($category->description, 90)}}</td>
                  <td>
                    <img src="{{asset('/storage/'.$category->image)}}" alt="{{$category->name}}" width="300px" height="150px;">
                  </td>
                  <td>{{$category->courses->count()}}</td>
                  <td>NGN{{$category->price}}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{route('category.edit', ['id' => $category->id, 'slug' => $category->slug])}}" class="btn btn-info btn-sm mr-2"><i class="fa fa-edit"></i> Edit</a>
  
                      <button type="submit" onclick="handleDelete({{$category->id}})" class="btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteCategory">
                        Delete</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            @endforeach
          </table>
        </div>
        <div class="card-footer ">
          <hr>
          @if(isset($category))
          <div class="stats">
            <i class="fa fa-history"></i> Updated {{$category->updated_at->diffForHumans()}}
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <form method="post" id="deleteCategoryForm">
    @csrf
    @method('DELETE')
    <div id="deleteCategory" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Delete Category</h4>
            </div>
            <div class="modal-body">
            <p>Are you sure you want to delete category<small id="name"></small> </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
        </div>
    
        </div>
    </div>
</form>

</div>
@endsection

<script>
    function handleDelete(id)
    {
        var form = document.getElementById('deleteCategoryForm');
        form.action = 'category/' + id;
        console.log('deleting', form);

    }

</script>
