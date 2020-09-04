@extends('layouts.front')

@section('title')
    {{-- @foreach ($company_detail as $item)
        {{$item->name}}
    @endforeach --}}
    {{'Grey Hat Cyber Solutions'}}
@endsection

@section('content')
    <div class="entry-w3pvt-main py-5">
        <div class="container px-lg-5 py-md-3">
            @foreach ($jumbo as $jumbo)
                <div class="entry-w3layouts-info">
                    <h4 class="text-capitalize">{{$jumbo->title}}</h4>
                    <p>{{$jumbo->body}}</p>
                </div>
            @endforeach
        </div>
    </div>
    <!-- //entry -->


    <!-- banner-bottom -->
    <section class="banner-bottom py-5" id="about">
        <div class="container py-md-4">
            <div class="row banner-grids">
                @foreach ($secondpara as $secondpara)
                <div class="col-lg-6 content-right-bottom text-left">
                    <img src="{{asset('/storage/'.$secondpara->image)}}" alt="{{$secondpara->title}}" class="img-fluid" style="width: 100%; height: 400px;">
                </div>
                    <div class="col-lg-6 content-left-bottom entry-w3layouts-info text-left pl-lg-4">
                        <h5 class="mt-1 text-capitalize">{{$secondpara->tag}}</h5>
                        <h4 class="text-capitalize">{{$secondpara->title}}</h4>
                        <p class="mt-2 text-left">{{$secondpara->body}}</p>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- //banner-bottom -->
    <!-- /team-content -->
    <section class="team-content py-5" id="team">
        <div class="container py-md-4 text-center">
            <h3 class="tittle-w3layouts two">Experienced Professors</h3>
            <div class="row team-grids text-center mt-md-5 mt-4">
                <div class="col-lg-4 team-main">

                    <div class="team-img"><img src="images/t1.jpg" alt="news image" class="img-fluid"> </div>
                    <div class="team-info">

                        <h4>Chester Roberson</h4>
                        <small>Associate Professor</small>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>


                </div>

                <div class="col-lg-4 team-main">
                    <div class="team-info">

                        <h4>Maude Collier</h4>
                        <small>Assistant Instructor</small>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>

                    <div class="team-img"><img src="images/t2.jpg" alt="news image" class="img-fluid"> </div>


                </div>

                <div class="col-lg-4 team-main">

                    <div class="team-img"><img src="images/t3.jpg" alt="news image" class="img-fluid"> </div>
                    <div class="team-info">

                        <h4>Hunter Duncan</h4>
                        <small>Assistant Instructor</small>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>


                </div>

            </div>

        </div>
    </section>
    <!-- //team-content -->
    <!-- banner-bottom -->
    <section class="banner-bottom py-5" id="exp">
        <div class="container py-md-4">
            <h3 class="tittle-w3layouts two text-center">Live the experience</h3>
            @foreach ($lives as $live)
            <div class="row mid-grids mt-5">
                <div class="col-md-5 content-w3pvt-img">
                    <img src="{{asset('/storage/'.$live->image)}}" alt="{{$live->tile}}" class="img-fluid" style="width: 90%; height: 240px">
                </div>
                <div class="col-md-7 content-left-bottom entry-w3layouts-info text-left mt-3">
                    <h5 class="mt-1 text-capitalize">{{$live->tag}}</h5>
                    <h4 class="text-capitalize">{{$live->title}}</h4>
                    <p class="mt-2 text-left text-capitalize">{{$live->body}}</p>

                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- //banner-bottom -->
    <!--/last-content-->
    <section class="last-content text py-5">
        <div class="container py-md-3 text-center">
            @foreach ($getstarted as $getstarted)
            <div class="last-w3pvt-inner-content px-lg-5">
                <h3 class="mb-4 tittle-w3layouts text-capitalize">{{$getstarted->title}}</h3>
                <p class="px-lg-5">{{$getstarted->body}}</p>
                <div class="buttons mt-md-4 mt-3">
                    @if(!auth()->user())
                    <a href="{{route('apply')}}" class="btn btn-default">Get Started</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--//last-content-->
    <section class="ab-info-main py-5">
        <div class="container py-md-4">
            <h3 class="tittle-w3layouts two text-center">Available Courses</h3>
            <div id="products" class="row view-group my-lg-5 my-4">
                @foreach ($categories as $category)
                <div class="item col-lg-4 my-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="{{asset('/storage/'.$category->image)}}" alt="{{$category->name}}" style="height: 230px; width:100%">
                        </div>
                        <div class="caption card-body" style="height: 160px;">
                            <h4 class="group card-title inner list-group-item-heading text-capitalize">
                                {{$category->name}}</h4>
                            <p class="group inner list-group-item-text">{{str_limit($category->description, 90)}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-md-4 mt-3 text-center">
                <a href="{{route('academy.index')}}" class="btn btn-danger text-light">View All Courses</a>
            </div>
            <div class="row text-center mt-lg-5 mt-4 pt-5" id="stats">
                <div class="col-sm-4">
                    <div class="counter">
                        <h3 class="count-title">{{$category->count()}}</h3>
                        <p class="count-text ">Categories</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="counter two">
                        <h3 class="count-title">{{$courses->count()}}</h3>
                        <p class="count-text ">Courses</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="counter">
                        <h3 class="count-title">{{$lessons->count()}}</h3>
                        <p class="count-text ">Lessons</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//-->
    <!--/testimonials-->
    @foreach ($student_testimony as $student_testimony)
    <section class="testimonials py-5" id="test">
        <div class="container py-3">
            @foreach ($testimony as $testimony)
            <h3 class="tittle-w3layouts text-center mt-3 text-capitalize">{{$testimony->header}}</h3>
            @endforeach

            <div class="testimonials_grid mx-auto text-center row px-lg-5 mt-5">

                <div class="col-md-3 testi_grid text-md-center">
                    <img src="{{asset('/storage/'.$student_testimony->user->image)}}" alt="{{$student_testimony->user->firstname}} {{$student_testimony->user->lastname}}" class="img-fluid text-center">
                </div>
                <div class="col-md-9 testi_grid text-left">
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <p class="sub-test pr-lg-5">{{$student_testimony->body}}</p>
                        <h5 class="text-capitalize">{{$student_testimony->user->firstname}} {{$student_testimony->user->lastname}}</h5>
                </div>
            </div>
        </div>
    </section> 
    @endforeach
    <!--//testimonials-->
@endsection

