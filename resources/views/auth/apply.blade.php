
        <!-- header -->
        
        <!-- //header -->
@extends('layouts.front')

@section('content')
<section class="banner-bottom py-5">
    <div class="container py-md-4">
        <h3 class="tittle-w3layouts two text-center mb-lg-5">Apply Now</h3>
        <div class="comment-top mt-5 row">
            <div class="col-lg-7 comment-bottom w3pvt_mail_grid_right">
                <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- firstname --}}
                        <div class="col-lg-6 form-group">
                            <label>First Name</label>
                            <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" value="{{ old('firstname') }}" placeholder="" required>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        {{-- lastname --}}
                        <div class="col-lg-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" placeholder="" value="{{ old('lastname')}}" required>
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- email --}}
                        <div class="col-lg-6 form-group">
                            <label>Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"  value="{{ old('email')}}" name="email" placeholder="" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- image --}}
                        <div class="form-group col-md-6">
                            <label for="image">{{ __('Upload Image') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" required>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- number --}}
                        <div class="col-lg-6 form-group">
                            <label>Phone Number</label>
                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text"  value="{{ old('phone_number')}}" name="phone_number" placeholder="" required>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit" class="btn submit mt-3">Register</button>
                </form>
            </div>
            <div class="col-lg-5 comment-bottom w3pvt_mail_grid-img">
                <img class="img-fluid" src="images/apply.jpg" alt="">
            </div>
        </div>

    </div>
</section>
@endsection
<!-- //banner-bottom -->
