@extends('layouts.admin_inc')

@section('content')
    {{-- Testimonial form --}}
    <div class="container pt-md-4">
        <div class="comment-bottom w3pvt_mail_grid_right p-0 mt-lg-5 mt-4">
            <h4 class="leave-w3layouts">Leave a Testimonial</h4>
            <form action="{{route('student_testimonial.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Write Message</label>
                    <textarea class="form-control" name="body" required></textarea>
                </div>
                <button type="submit" class="btn gradient-button gradient-button-4 mt-3">Submit</button>
            </form>
        </div>
    </div>


    {{-- Your Testimonies --}}
    {{-- @if(auth()->user()->testimonials > 0) --}}
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-head bg-info">
                        <h5 class="card-title pl-3 py-3">Your Testimonies</h5>
                        <p class="card-course"></p>
                        </div>
                        <div class="card-body ">
                        <table class="table table-hover table-striped table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonies as $testimony)
                                <tr>
                                <td class="p-3">{{$testimony->body}}</td>
                                <td class="font-weight-bold">
                                    @if($testimony->published == 0)
                                        {{'Awaiting Publishing'}}
                                    @else
                                        {{'Reviewed'}}
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="card-footer ">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endif --}}
@endsection