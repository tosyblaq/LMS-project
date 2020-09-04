@extends('layouts.front')

@section('content')
<div>
   
    <!-- banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-md-4">
            <h3 class="tittle-w3layouts two text-center text-info font-weight-bold">Courses We Offer</h3>
            <div id="products" class="row view-group mt-md-4 mt-4">
                @foreach ($categories as $category)
                <div class="item col-sm-12 col-md-6 col-lg-4 p-3 shadow-sm">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <a href="{{route('academy.course', ['id' => $category->id, 'slug' => $category->slug])}}">
                                <img class="group list-group-image img-fluid" src="{{asset('/storage/'.$category->image)}}" alt="{{$category->name}}" style="height: 230px; width:100%" />
                            </a>
                        </div>

                        <div class="caption card-body" style="height: 260px;">
                            <h4 class="text-capitalize group card-title inner list-group-item-heading text-info font-weight-bold" style="height: 60px; text-shadow: 1px 0px rgb(5, 85, 122);">
                                {{str_limit($category->name, 40)}}</h4>
                            <p class="group inner list-group-item-text text-secondary" style="height: 80px">{{str_limit($category->description, 90)}}</p>
                            <div class="row mt-4 d-flex">
                                <div>
                                    <a class="btn gradient-sm-button gradient-button-1 btn-sm" href="{{route('academy.course', ['id' => $category->id, 'slug' => $category->slug])}}">View Courses</a>
                                </div>
                                <div class="ml-auto">
                                    <p class="lead text-info font-weight-bold">NGN{{$category->price}}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                {{-- Pagination --}}
                {{$categories->links()}}
            </div>
        </div>
    </section>
    <!-- //banner-bottom -->

</div>

@endsection