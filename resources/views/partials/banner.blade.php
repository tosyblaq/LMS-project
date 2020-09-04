<!-- banner -->
<div class="banner-content-w3pvt">
    <div class="banner-w3layouts-info text-center">
        {{-- <h3>Any successful career starts with a good Education</h3> --}}
        @foreach ($frontheader as $frontheader)
            <h3>{{$frontheader->title}}</h3>
        @endforeach
        @if(!auth()->user())
        <a href="{{route('apply')}}" class="btn btn-success font-weight-bold">Join</a>
        <a href="{{route('login')}}" class="btn btn-light text-danger font-weight-bold">Login</a> 
        @endif
    </div>
</div>
<!-- //banner -->