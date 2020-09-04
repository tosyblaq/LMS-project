@extends('layouts.front')

@section('content')
<div>
   
    <!-- banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container">
            <div class="">
                <div>
                    <h3 class="tittle-w3layouts two text-center text-capitalize text-info font-weight-bold pb-5">
                        {{$current->name}} Courses
                    </h3>
                </div>
                
                <div class="product-details-info">
                    @if(Auth::user())
                        @if(!$acct)
                            <div class="product-details-info-price pl-5 text-danger font-weight-bold"><span class="text-dark">Price:</span> NGN{{$current->price}}</div>
                        @endif
                    @else
                        <div class="product-details-info-price pl-5 text-danger font-weight-bold"><span class="text-dark">Price:</span> NGN{{$current->price}}</div>
                    @endif

                    <form action="{{route('cart.add', ['id' => $current->id])}}" method="post" class="mb-5 pl-5">
                        @csrf
                        <div class="quantity">
                            <input name="quantity" type="hidden" value="1" class="email input-text qty text">
                        </div>
                        
                        @if($alreadyInCart)
                            <span class="btn gradient-button gradient-button-4">Added to Cart <i class="seoicon-commerce"></i></span>
                            
                        @else
                            @if(Auth::user())
                                @if(!$acct)
                                    <button type="submit" class="btn gradient-button gradient-button-4">
                                        <span class="text">Add to Cart</span>
                                        <i class="seoicon-commerce"></i>
                                    </button>
                                @endif
                            @else
                                <button type="submit" class="btn gradient-button gradient-button-4">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </button>
                            @endif    
                        @endif
                        
                    </form>
                </div>

                {{-- @endif   --}}
           </div>

            @if(Auth::user())
                @if(!$acct)
                    <div class="alert alert-info">
                        <p class="text-capitalize text-dark font-weight-bold">By paying a sum of <span class="text-danger">NGN{{$current->price}}</span>, you would have access to all courses in this category </p> 
                    </div> 
                @endif
            @else
                <div class="alert alert-info">
                    <p class="text-capitalize text-dark font-weight-bold">By paying a sum of <span class="text-danger">NGN{{$current->price}}</span>, you would have access to all courses in this category </p> 
                </div>
            @endif

            {{-- <div class="bg-info row col-md-12 my-3">
                @foreach ($courses as $course)
                <div class="item col-lg-4 thumbnail bg-dark p-3">
                    <div class="card-head">
                        <a href="{{route('academy.coursedetails', ['id' => $course->id, 'slug' => $course->slug])}}">
                            <img class="group list-group-image img-fluid" src="{{asset('/storage/'.$course->image)}}" alt="{{$course->title}}" style="height: 230px; width:100%" />
                        </a>
                    </div>
                    <div class="caption card-body" style="height: 260px;">
                        <h4 class="text-capitalize group card-title inner list-group-item-heading">{{$course->title}}</h4>
                        <p class="group inner list-group-item-text">{!!str_limit($course->description, 90)!!}</p>
                        <div class="course-des mt-4">
                            <div class="ban-buttons">
                                <a class="btn btn-danger btn-sm" href="{{route('academy.coursedetails', ['id' => $course->id, 'slug' => $course->slug])}}">View Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}

            <div id="products" class="row view-group mt-md-4 mt-4">
                {{-- {{$course->category->name}} --}}
                @foreach ($courses as $course)
                <div class="item col-sm-12 col-md-6 col-lg-4 p-3 shadow-sm">
                    <div class="thumbnail card">
                        <div class="img-event card-head">
                            <a href="{{route('academy.coursedetails', ['id' => $course->id, 'slug' => $course->slug])}}">
                                <img class="group list-group-image img-fluid" src="{{asset('/storage/'.$course->image)}}" alt="{{$course->title}}" style="height: 230px; width:100%" />
                            </a>
                        </div>
                        <div class="caption card-body" style="height: 260px;">
                            <div>
                                <h5 class="text-capitalize group card-title inner list-group-item-heading text-info font-weight-bold" style="height: 70px">{!!str_limit($course->title, 60)!!}</h5>
                                <h6 class="group inner list-group-item-text text-secondary" style="height: 80px">
                                    {!!str_limit($course->description, 90)!!}</h6>
                                    
                            </div>
                            <div class="course-des mt-4">
                                <div class="ban-buttons">
                                    <a class="btn gradient-sm-button gradient-button-1 btn-sm" href="{{route('academy.coursedetails', ['id' => $course->id, 'slug' => $course->slug])}}">View Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- //banner-bottom -->

</div>

@endsection