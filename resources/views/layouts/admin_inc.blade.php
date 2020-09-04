<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/blogger-icon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  {{-- from front.blade.php --}}
    <!-- Custom Theme files -->
    <link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('css/style2.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //online-fonts -->
  {{-- end --}}
  
<style>
    .bg{
        background:rgba(19, 160, 185, 0.979);
    }
    @media(min-width: 992px){
        .smallScreen{
            display: none;
        }
    }
    @media(max-width: 968px) {
        .table{
            display: block; 
            overflow-x: auto; 
            white-space: nowrap;
        }
    }

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

  <title>
    @yield('title')
  </title>
  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />

  
  {{-- Datatable --}}
  <link rel="stylesheet" type="text/css" href="{{asset('app/css/datatables.css')}}" >
  {{-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> --}}
  
  <link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.min.css')}}" >
  
  {{-- Toastr --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}" >

{{-- select 2 --}}
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  {{-- Yield Css --}}
  @yield('css')
</head>

<body class="">

<div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo" style="background: #609dd2">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{asset('img/blogger-icon.png')}}">
            </div>
        </a>
        <a class="navbar-brand text-light" href="{{ url('/') }}">
            {{ config('app.name', 'Grey Hat') }}
        </a>

        <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
        </div> -->
    </div>
    <div class="sidebar-wrapper bg-dark">
        <ul class="nav font-weight-bold text-light">
            @if(auth()->user()->isAdmin())
            <li class="{{request()->path() == 'admin/dashboard' ? 'active bg' : ''}}">
                <a href="{{route('dashboard.index')}}">
                <i class="nc-icon nc-bank"></i>
                <p class="text-light font-weight-bold">Dashboard</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/category' ? 'active bg' : ''}}">
                <a href="{{route('category.index')}}">
                <i class="fa fa-list-alt text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Category</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/course' ? 'active bg' : ''}}">
                <a href="{{route('course.index')}}">
                <i class="fa fa-tag text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Courses</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/enrollStudent' ? 'active bg' : ''}}">
                <a href="{{route('student.enroll')}}">
                <i class="fa fa-upload text-danger"></i>
                <p class="text-light font-weight-bold">Enrolled Student</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/section' ? 'active bg' : ''}}">
                <a href="{{route('section.index')}}">
                <i class="fa fa-upload text-danger"></i>
                <p class="text-light font-weight-bold">Lessons Sections</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/role' ? 'active bg' : ''}}">
                <a href="{{route('role.index')}}">
                <i class="fa fa-upload text-danger"></i>
                <p class="text-light font-weight-bold">Roles</p>
                </a>
            </li>
            <li class="{{request()->path() == 'user' ? 'active bg' : ''}}">
                <a href="{{route('user.index')}}">
                <i class="nc-icon nc-single-02 text-danger"></i>
                <p class="text-light font-weight-bold">Users</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/frontpage' ? 'active bg' : ''}}">
                <a href="{{route('frontpage.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Front Page Header</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/jumbo' ? 'active bg' : ''}}">
                <a href="{{route('jumbo.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Jumbotron Section</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/getstarted' ? 'active bg' : ''}}">
                <a href="{{route('getstarted.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">GetStarted Section</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/testimonial' ? 'active bg' : ''}}">
                <a href="{{route('testimonial.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Testimonial Header</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/student_testimonial' ? 'active bg' : ''}}">
                <a href="{{route('student_testimonial.adminindex')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Student Testimonial</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/secondpara' ? 'active bg' : ''}}">
                <a href="{{route('secondpara.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Second Paragraph</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/live' ? 'active bg' : ''}}">
                <a href="{{route('live.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Live The Experience</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/company' ? 'active bg' : ''}}">
                <a href="{{route('company.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Company Details</p>
                </a>
            </li>
            <li class="{{request()->path() == 'admin/admin_view_comment' ? 'active bg' : ''}}">
                <a href="{{route('admin_view_comment.admin')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Course Comment</p>
                </a>
            </li>
            <li class="{{request()->path() == 'user/allOrders' ? 'active bg' : ''}}">
            <a href="{{route('cart.allOrders')}}">
                <i class="fa fa-shopping-cart text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">All Orders</p>
                </a>
            </li>
            @endif

            <li class="{{request()->path() == 'user'.'/'.auth()->user()->id.'/'.'edit' ? 'active bg' : ''}}">
                <a href="{{route('user.edit', ['id' => auth()->user()->id])}}">
                <i class="fa fa-user text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">User Profile</p>
                </a>
            </li>
            
            <li class="{{request()->path() == 'user'.'/'.auth()->user()->id.'/'.'myOrder' ? 'active bg' : ''}}">
                <a href="{{route('cart.myOrder', ['id' => auth()->user()->id])}}">
                <i class="fa fa-shopping-cart text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">My Order</p>
                </a>
            </li>

            @if(auth()->user()->role == 'student')
            <li class="{{request()->path() == 'student_testimonial' ? 'active bg' : ''}}">
                <a href="{{route('student_testimonial.index')}}">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light font-weight-bold">Leave a Testimonial</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
    </div>
    <div class="main-panel">

    <nav class="navbar navbar-expand navbar-info shadow-sm" style="background: #609dd2">
        <div class="container">
            {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'CMS') }}
            </a> --}}
            
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Small Screen --}}
    <div class="smallScreen bg-dark">
        <ul class="font-weight-bold">
            @if(auth()->user()->isAdmin())
            <li class="{{request()->path() == 'admin/dashboard' ? 'active bg' : ''}}">
                <a href="{{route('dashboard.index')}}" class="d-flex p-3">
                <i class="nc-icon nc-bank"></i>
                <p class="text-light pl-2 font-weight-bold">Dashboard</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/category' ? 'active bg' : ''}}">
                <a href="{{route('category.index')}}" class="d-flex p-3">
                <i class="fa fa-list-alt text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Category</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/course' ? 'active bg' : ''}}">
                <a href="{{route('course.index')}}" class="d-flex p-3">
                <i class="fa fa-tag text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Courses</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/enrollStudent' ? 'active bg' : ''}}">
                <a href="{{route('student.enroll')}}" class="d-flex p-3">
                <i class="fa fa-upload text-danger"></i>
                <p class="text-light pl-2 font-weight-bold">Enrolled Student</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/section' ? 'active bg' : ''}}">
                <a href="{{route('section.index')}}" class="d-flex p-3">
                <i class="fa fa-upload text-danger"></i>
                <p class="text-light pl-2 font-weight-bold">Lessons Sections</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/role' ? 'active bg' : ''}}">
                <a href="{{route('role.index')}}" class="d-flex p-3">
                <i class="fa fa-upload text-danger"></i>
                <p class="text-light pl-2 font-weight-bold">Roles</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'user' ? 'active bg' : ''}}">
                <a href="{{route('user.index')}}" class="d-flex p-3"q>
                <i class="nc-icon nc-single-02 text-danger"></i>
                <p class="text-light pl-2 font-weight-bold">Users</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/frontpage' ? 'active bg' : ''}}">
                <a href="{{route('frontpage.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Front Page Header</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/jumbo' ? 'active bg' : ''}}">
                <a href="{{route('jumbo.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Jumbotron Section</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/getstarted' ? 'active bg' : ''}}">
                <a href="{{route('getstarted.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">GetStarted Section</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/testimonial' ? 'active bg' : ''}}">
                <a href="{{route('testimonial.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Testimonial Header</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/student_testimonial' ? 'active bg' : ''}}">
                <a href="{{route('student_testimonial.adminindex')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Student Testimonial</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/secondpara' ? 'active bg' : ''}}">
                <a href="{{route('secondpara.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Second Paragraph</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/live' ? 'active bg' : ''}}">
                <a href="{{route('live.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Live The Experience</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/company' ? 'active bg' : ''}}">
                <a href="{{route('company.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Company Details</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'admin/admin_view_comment' ? 'active bg' : ''}}">
                <a href="{{route('admin_view_comment.admin')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Course Comment</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'user/allOrders' ? 'active bg' : ''}}">
                <a href="{{route('cart.allOrders')}}" class="d-flex p-3">
                <i class="fa fa-shopping-cart text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">All Orders</p>
                </a>
            </li>
            <hr class="bg-light">
            @endif

            <li class="{{request()->path() == 'user'.'/'.auth()->user()->id.'/'.'edit' ? 'active bg' : ''}}">
                <a href="{{route('user.edit', ['id' => auth()->user()->id])}}" class="d-flex p-3">
                <i class="fa fa-user text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">User Profile</p>
                </a>
            </li>
            <hr class="bg-light">
            <li class="{{request()->path() == 'user'.'/'.auth()->user()->id.'/'.'myOrder' ? 'active bg' : ''}}">
                <a href="{{route('cart.myOrder', ['id' => auth()->user()->id])}}" class="d-flex p-3">
                    <i class="fa fa-shopping-cart text-danger" aria-hidden="true"></i>
                    <p class="text-light pl-2 font-weight-bold">My Order</p>
                </a>
            </li>
            <hr class="bg-light">
            
            @if(auth()->user()->role == 'student')
            <li class="{{request()->path() == 'student_testimonial' ? 'active bg' : ''}}">
                <a href="{{route('student_testimonial.index')}}" class="d-flex p-3">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                <p class="text-light pl-2 font-weight-bold">Leave a Testimonial</p>
                </a>
            </li>
            <hr class="bg-light">
            @endif
        </ul>

        {{-- <nav class="navbar navbar-expand-md navbar-expand-xs navbar-info shadow-sm" style="background: #609dd2">
            <div class="container">
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
    </div>
    <!-- End Navbar -->


    {{-- Session Success --}}
    {{-- @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif --}}

    {{-- Session Error --}}
    {{-- @if(session()->has('error'))
        <div class="alert alert-warning">
            {{session('error')}}
        </div>
    @endif --}}

    {{-- Content --}}
    @yield('content')



    </div>
</div>



  <!--   Core JS Files   -->
  <script src="{{asset('js/core/jquery.min.js')}}"></script>
  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('demo/demo.js')}}"></script>
  {{-- Toastr --}}
  <script type="text/javascript" charset="utf8" src="{{asset('js/toastr.min.js')}}"></script>
  
  
  <script src="{{asset('js/dropzone.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  {{-- Datatable --}}
  <script type="text/javascript" charset="utf8" src="{{asset('app/js/datatables.js')}}"></script>
  <script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  
  {{-- select2 js --}}
  <script src="{{asset('js/select2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@yield('scripts')
  
</body>

</html>



<script>
    $(document).ready( function () {
        $('#course').DataTable();
    } );

    //Select2
    $(document).ready(function() {
        $('.selectBox').select2();
    });
</script>

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
