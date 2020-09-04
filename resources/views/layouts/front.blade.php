<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Provision Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}

    {{-- from public/app --}}
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/progress.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/fonts/font-awesomr.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/videoPlayer.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('app/css/videoPlayer2.css')}}"> --}}
    
    <!--Plugins styles-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
    
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>


    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />

    {{--  --}}

    {{-- End --}}


    <!-- Custom Theme files -->
    {{-- <link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all"> --}}
    <link href="{{asset('css/style2.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //online-fonts -->

    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}" >

    @yield('style')
    @yield('css')

    <style>
        #episode_display:hover{
            background:lightgrey;
        }
        .gradient-sm-button {
            /* margin: 10px; */
            font-family: "Arial Black", Gadget, sans-serif;
            font-size: 12px;
            padding: 10px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: #FFF;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            width: 150px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }

        .gradient-button-1 {background-image: linear-gradient(to right, #DD5E89 0%, #F7BB97 51%, #DD5E89 100%)}
        .gradient-button-1:hover { background-position: right center; }

        .gradient-button {
            /* margin: 10px; */
            font-family: "Arial Black", Gadget, sans-serif;
            font-size: 15px;
            padding: 15px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: #FFF;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }

        .gradient-button-4 {background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)}
        .gradient-button-4:hover { background-position: right center; }
    </style>
</head>
    
</body>

    <!-- main -->
    <div @if(request()->path() == '/') class="main-content" @else class="main-content inner" @endif id="home">
        <!-- header -->
        <header>
            <div class="container-fluid">
                <!-- nav -->
                <nav class="py-md-4 py-3 d-lg-flex nav_w3pvt">
                    @foreach ($company_detail as $company_detail)
                    <div id="logo">
                        <h1><a href="/">{{$company_detail->name}}</a></h1>
                    </div>
                    @endforeach
                    <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-lg-3 ml-auto">
                        <li @if(request()->path() == '/') class="active" @endif><a href="{{route('/')}}">Home</a></li>
                        {{-- <li><a href="about.html">About Us</a></li> --}}
                        <li><a @if(request()->path() == '/') href="#exp" @else href="/#exp" @endif>Experience</a></li>
                        {{-- academic.index is the route name for the view all course pagr --}}
                        <li @if(request()->path() == 'academy') class="active" @endif><a href="{{route('academy.index')}}">Courses</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        @if(auth()->user())
                        <li>
                            <a href="
                                @if(auth()->user()->isAdmin())
                                    {{route('dashboard.index')}}
                                @else
                                    {{route('user.edit', ['id' => auth()->user()->id])}}
                                @endif
                            ">Dashboard</a>
                        </li>
                        @endif
                        {{-- route('user.edit', ['id' => auth()->user()->id])@endif --}}
                        {{-- route('dashboard.index') --}}
                        {{-- cart --}}
                        <li class="cart">
                            <a href="#" class="js-cart-animate">
                                <i class="seoicon-basket" style="font-weight: bolder"></i>
                                <span class="cart-count">{{Cart::content()->count()}}</span>
                            </a>
        
                            <div class="cart-popup-wrap">
                                <div class="popup-cart bg-info">
                                    <h4 class="title-cart text-light pl-3">${{Cart::total()}}</h4>
                                    <a href="{{route('cart.item')}}">
                                        <button class="btn btn-dark text-light mt-2">View Cart</button>
                                    </a>
                                </div>
                            </div>
                        </li>
                        {{-- end --}}
                        <li>
                            <p class="w3pvt-phone">
                                <span class="fa fa-phone mr-2"></span>{{$company_detail->phone_number}}
                            </p>
                        </li>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        
        @if(request()->path() == '/')
            @include('partials.banner')
        @endif
    </div>


    @yield('content')



    <!-- footer -->
    <footer class="footer-content text-center py-5">
        {{-- @foreach ($company_detail as $company_detail) --}}
        <div class="container py-md-3">
            <!-- logo -->
            <h2 class="logo2 text-center">
                <a href="{{route('/')}}">
                    {{$company_detail->name}}
                </a>
            </h2>

            <!-- //logo -->
            <!-- address -->
            <div class="contact-left-footer mt-md-4">
                <ul>
                    <li>
                        <p>
                            <span class="fa fa-map-marker mr-2"></span>{{$company_detail->address}}
                        </p>
                    </li>
                    <li class="mx-4">
                        <p>
                            <span class="fa fa-phone mr-2"></span>{{$company_detail->phone_number}}
                        </p>
                    </li>
                    <li>
                        <p class="text-wh">
                            <span class="fa fa-envelope-open mr-2"></span>
                            <a href="mailto:{{$company_detail->email}}" target="_blank">{{$company_detail->email}}</a>
                        </p>
                    </li>
                </ul>
            </div>
            <!-- //address -->
            <!-- social icons -->
            <div class="footer-w3pvt-copy-social my-4">
                <ul>
                    <li>
                        <a href="#">
                            <span class="fa fa-facebook-square"></span>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="#">
                            <span class="fa fa-twitter-square"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="fa fa-google-plus-square"></span>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="#">
                            <span class="fa fa-linkedin-square"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-rss-square"></span>
                        </a>
                    </li>
                    <li class="ml-2">
                        <a href="#">
                            <span class="fa fa-pinterest-square"></span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="col-md-6 mb-3 mx-auto">
                <h3 for="newsletter" class="text-secondary pb-3">Email Newsletters</h3>
                <form action="{{route('newsletter.store')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email Address" autocomplete="email" required>
                        <div class="input-group-prepend">
                            <button class="input-group-text gradient-sm-button gradient-button-4" style="border: 0px solid #fff">Subscribe</button>
                        </div>
                    </div>
                </form>
                <div class="sub-title text-secondary py-2">Sign up to get the latest content, updates & offers from {{$company_detail->name}}.</div>
            </div>

            <!-- //social icons -->
            <!-- copyright -->
            <div class="w3layouts-copy text-center">
                <p class="text-da">© <script>
                    document.write(new Date().getFullYear())
                    </script> 
                    {{$company_detail->name}}. All rights reserved
                </p>
            </div>
            <!-- //copyright -->
            <!-- move top icon -->
			 <div class="move-top text-center mt-3">
            <a href="#home" class="move-top"><span class="fa fa-angle-double-up" aria-hidden="true"></span></a>
			</div>
			<!-- //move top icon -->
        </div>
    </footer>
    <!-- //footer -->
    
    {{-- Toastr --}}
    <script type="text/javascript" charset="utf8" src="{{asset('js/toastr.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('app/js/videoPlayer.js')}}"></script>


    {{-- public/app --}}
    <script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
    <script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
    <script src="{{asset('app/js/theme-plugins.js')}}"></script>
    <script src="{{asset('app/js/main.js')}}"></script>
    <script src="{{asset('app/js/form-actions.js')}}"></script>
    
    <script src="{{asset('app/js/velocity.min.js')}}"></script>
    <script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('app/js/animation.velocity.min.js')}}"></script>

    @yield('scripts')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     --}}
     
    {{-- end --}}

</html>

<script>
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{Session::get('warning')}}");
    @endif
</script>