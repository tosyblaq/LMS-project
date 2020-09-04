@extends('layouts.front')

@section('content')
<div class="container">
    <div class="text-center mt-5 mb-lg-4 mb-sm-2 mb-xs-2">
        <h3 class="text-info font-weight-bold text-capitalize">{{$course->title}}</h3>
    </div>
    <div>
        <div class="text-center">
            <figure class="text-center">
                {{-- src="{{asset('/storage/'.$course->intro_video)}}" --}}
                <video src="{{isset($playfreevideo) ? asset('/storage/'.$playfreevideo->video_episode) : asset('/storage/'.$course->intro_video) }}" id="video" class="screen" oncontextmenu="return false;" controlsList="nodownload"></video>
                <div class="mx-auto bg-dark p-1 ProgressDiv">
                    <input type="range" id="progress" class="progress" min="0" max="100" step="0.1" value="0"/>
                </div>
                <div class="controls mx-auto">
                    <button class="videoBtn" id="play">
                        <i class="fa fa-play fa-2x"></i>
                    </button>
                    <button class="videoBtn mx-2" id="stop">
                        <i class="fa fa-stop fa-2x"></i>
                    </button>
                    <button style="background: #333 !important" title="increase volume"><i id="volinc" class="fa fa-volume-up fa-2x text-light" aria-hidden="true" title="increase volume"></i></button>
                    <button class="mx-2" style="background: #333 !important" title="decrease volume"><i id="voldec" class="fa fa-volume-down mx-3 fa-2x text-light" aria-hidden="true" title="decrease volume"></i></button>
                    <button class="enterFullscreenBtn" style="background: #333 !important" class="mx-2" title="watch in fullscreen"><i class="fa fa-expand fa-2x text-light" title="watch in fullscreen"></i></button>
                    <span class="timestamp ml-3 font-weight-bold" id="timestamp">00:00</span>
                </div>
            </figure>
        </div>

        <div class="row ml-lg-1 ml-sm-2">
            <div class="col-lg-8 mx-auto pt-4 bg-light" style="height: 300px; overflow:scroll">
                @foreach($lessons as $lesson)
                    {{-- @if($lesson_section['section_id'] === $lesson->section_id) --}}
                        <a href="{{route('academy.playfreevideo', ['id' => $lesson->id, 'courseId' => $course->id, 'courseSlug' => $course->slug ])}}" >
                            <div class="d-flex my-2" id="episode_display">
                                <div>
                                    <video id="lessonVideo" src="{{asset('/storage/'.$lesson->video_episode)}}" style="height: 70px; width: 100px;"></video>
                                    
                                    <small class="ml-3 pr-3 pt-1 text-dark font-weight-bold text-lowercase" style="position:absolute;">
                                        {{$lesson->title}} &nbsp; <span class="text-info font-weight-bold text-capitalize float-right">@if($lesson->free_episode == 1) Free Lesson @endif</span>
                                    </small>
                                </div> 
                            </div>
                        </a>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
        @if(Auth::user())
            @foreach ($orders as $order)
                @if(in_array($course->category->id, array($order->category_id)))
                <div class="row col-lg-7 my-3 col-md-8 col-xs-12 col ml-lg-1">
                    <a class="btn gradient-sm-button gradient-button-4 ml-lg-auto ml-md-auto" href="{{route('academy.showcourse', ['id' => $course->id, 'slug' => $course->slug, 'categoryId' => $course->category->id])}}" >View Lessons</a>
                </div>
                @endif
            @endforeach
        @endif

        {{-- http://127.0.0.1:8000/academy/3/show/mastering-adobe-illustrator-tools-for-beginners/2 --}}
    </div>

    {{-- Course Description --}}
    {{-- <div class="col-lg-10 col-md-10 col-xs-12 my-4 ml-lg-5 ml-md-5">
        <h3 class="font-weight-bold mb-3 text-capitalize">about the course</h3>      
        <p class="product-details-info-text" style="text-align: justify">{!!$course->description!!}</p>
    </div> --}}

    <div style="" class="row ml-lg-1 ml-sm-2 col-lg-12 bg-light p-4 my-5 col-xs-12">
        <h3 class="font-weight-bold my-4 text-capitalize">about the course</h3>
        <div style="text-align: justify">{!!$course->description!!}</div>
    </div>

    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 my-4 ml-lg-5 ml-md-4">
        {{-- Course comments --}}
        {{-- <div class="comment-sec-w3layouts mt-5">
            <h4 class="leave-w3layouts">Comments</h4>
            <ul class="list-unstyled">
                @foreach ($course_comments as $course_comment)
                <li class="media my-5">
                    <img class="mr-3 img-fluid img-rounded" src="{{asset('/storage/'.$course_comment->user->image)}}" alt="{{$course_comment->user->firstname}} {{$course_comment->user->lastname}}" style="height: 40px; width: 40px;">
                    <div class="media-body" style="background: rgb(220, 225, 230)">
                        <h5 class="mt-0 mb-1 text-info p-3 font-weight-bold">{{$course_comment->user->firstname}} {{$course_comment->user->lastname}}</h5>
                        <p class="mt-1 p-3">{{$course_comment->comment}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
 --}}

        <div class="comment-sec-w3layouts col-md-12">
            <h4 class="leave-w3layouts">Comments</h4>
            <ul class="list-unstyled" >
                @foreach ($course_comments as $course_comment)
                <li class="media my-5">
                    <img class="mr-3 img-fluid img-rounded" src="{{asset('/storage/'.$course_comment->user->image)}}" alt="{{$course_comment->user->firstname}} {{$course_comment->user->lastname}}" style="height: 40px; width: 40px;">
                    <div class="media-body bg-light" style="box-shadow: -3px -3px 6px grey">
                        <h5 class="mt-0 mb-1 text-info p-3 font-weight-bold">{{$course_comment->user->firstname}} {{$course_comment->user->lastname}}</h5>
                        <p class="mt-1 p-3">{{$course_comment->comment}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

    </div>

</div>

<script>
// const $video1=$('video');
// //fullscreen button clicked
// $('.fa-expand').on('click', function() {
// $(this).toggleClass('enterFullscreenBtn');
//     if($.isFunction($video1.get(0).webkitEnterFullscreen)) {
//               if($(this).hasClass("enterFullscreenBtn"))
//                   document.getElementById('videoContainer').webkitRequestFullScreen();                          
//               else 
//               document.webkitCancelFullScreen();    
//     }  
//     else if ($.isFunction($video1.get(0).mozRequestFullScreen)) {
//               if($(this).hasClass("enterFullscreenBtn"))
//                   document.getElementById('videoContainer').mozRequestFullScreen(); 
//                else 
//                   document.mozCancelFullScreen();   
//     }
//     else { 
//            alert('Your browsers doesn\'t support fullscreen');
//     }
// });
</script>
@endsection