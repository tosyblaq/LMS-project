@extends('layouts.front')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('style')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
<style>
ul { list-style-type: none; }

a {
  color: #b63b4d;
  text-decoration: none;
}

/** =======================
 * Contenedor Principal
 ===========================*/


.accordion {
  width: 100%;
  margin: 30px auto 20px;
  background: #FFF;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

.accordion .link {
  cursor: pointer;
  display: block;
  padding: 15px 15px 15px 42px;
  color: #4D4D4D;
  font-size: 14px;
  font-weight: 700;
  border-bottom: 1px solid #CCC;
  position: relative;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li:last-child .link { border-bottom: 0; }

.accordion li i {
  position: absolute;
  top: 16px;
  left: 12px;
  font-size: 18px;
  color: #595959;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
  right: 12px;
  left: auto;
  font-size: 16px;
}

.accordion li.open .link { color: #b63b4d; }

.accordion li.open i { color: #b63b4d; }

.accordion li.open i.fa-chevron-down {
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}

/**
 * Submenu
 -----------------------------*/


.submenu {
  display: none;
  background: #333336;
}

.submenu li { border-bottom: 1px solid #4b4a5e; }

.submenu a {
  display: block;
  text-decoration: none;
  color: #d9d9d9;
  padding: 12px;
  padding-left: 42px;
  -webkit-transition: all 0.25s ease;
  -o-transition: all 0.25s ease;
  transition: all 0.25s ease;
}

.submenu a:hover {
  background: #b63b4d;
  color: #FFF;
}

/* .questionDiv{
    display: none;
} */
</style> 
@endsection

@section('content')
<div>
    <!-- banner-bottom -->
    <section class="banner-bottom py-5">
       <div class="container py-md-4">
           <h3 id="title" class="tittle-w3layouts two text-center mb-lg-5 text-capitalize text-info">
               {{$course->title}}
           </h3>
           <div class="single-w3pvt-page mt-md-5 mt-4">
               {{-- col-lg-12 col-xs-12  --}}
               <div class="row bg-light ml-lg-1 ml-sm-2" style="box-shadow: -3px -3px 5px grey">
                    {{-- Intro video --}}
                    {{-- {{asset('/storage/'.$course->intro_video)}} --}}
                    <div id="placeVideo" class="content-sing-w3layouts col-md-12 text-center">
                        <div class="text-center">
                            <video src="{{ isset($playvideo) ? asset('/storage/'.$playvideo->video_episode) : asset('/storage/'.$course->intro_video) }}" id="video" class="screen mt-2" style="width: 100%" oncontextmenu="return false;" controlsList="nodownload"></video>
                            <div class="mx-auto bg-dark p-1 ProgressDiv" style="width: 100%">
                                <input type="range" id="progress" class="progress" min="0" max="100" step="0.1" value="0"/>
                            </div>
                            <div class="controls mx-auto" style="width: 100%">
                                <button class="videoBtn" id="play">
                                    <i class="fa fa-play fa-2x"></i>
                                </button>
                                <button class="videoBtn mx-1" id="stop">
                                    <i class="fa fa-stop fa-2x"></i>
                                </button>
                                <button style="background: #333 !important" title="increase volume"><i id="volinc" class="fa fa-volume-up fa-2x text-light" aria-hidden="true" title="increase volume"></i></button>
                                <button class="mx-1" style="background: #333 !important" title="decrease volume"><i id="voldec" class="fa fa-volume-down mx-2 fa-2x text-light" aria-hidden="true" title="decrease volume"></i></button>
                                <button style="background: #333 !important" class="mx-2" title="watch in fullscreen"><i class="fa fa-expand fa-2x text-light" title="watch in fullscreen"></i></button>
                                <span class="timestamp ml-3 font-weight-bold" id="timestamp">00:00</span>
                            </div>
                        </div>
                        @if(isset($playvideo))
                            <h5 style="font-size: 16px;" class="py-4 text-info font-weight-bold text-capitalize">lesson title: {{$playvideo->title}}</h5>
                        @endif
                    </div>
               </div>

               <div class="jquery-script-ads" align="center" style="margin:20px auto">
                    <script type="text/javascript">
                    
                        google_ad_client = "ca-pub-2783044520727903";
                        /* jQuery_demo */
                        google_ad_slot = "2780937993";
                        google_ad_width = 728;
                        google_ad_height = 90;
                        //
                    </script>
                    
                    <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                    </script>
                </div>
              
               <ul id="accordion" class="accordion row bg-dark">
                    <h5 class="font-weight-bold text-capitalize text-light pt-4 pb-3 pl-3">{{$course->title}} course content</h5>
                    <div class="col-lg-12 pt-4 mb-5">
                        <li>
                        @foreach($lesson_section as $lesson_section)
                        <div class="link bg-light"><i class="fa fa-database"></i>section {{$lesson_section['section_id']}}: {{$lesson_section['section_title']}}<i class="fa fa-chevron-down"></i></div>
                        <ul class="submenu">
                            @foreach($lessons as $lesson)
                            <li>
                                @if($lesson_section['section_id'] === $lesson->section_id)
                                    <a href="{{route('academy.playvideo', ['id' => $lesson->id, 'courseId' => $course->id, 'courseSlug' => $course->slug, 'categoryId' => $course->category->id])}}" >
                                        <div class="d-flex my-2" >
                                            <div>
                                                <video attr={{$lesson->id}} attr1={{$course->id}} attr2={{$course->slug}} id="lessonVideo" src="{{asset('/storage/'.$lesson->video_episode)}}" style="height: 70px; width: 100px;"></video>
                                                
                                                <small class="ml-3 pr-3 pt-1 font-weight-bold text-lowercase" style="position:absolute;">
                                                    {{$lesson->title}}
                                                </small>
                                            </div> 
                                        </div>
                                    </a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <hr class="my-1">
                        @endforeach
                        </li>
                    </div>
                </ul>
               
               {{-- <div class="row ml-lg-1 ml-sm-2">
                    <h5 class="font-weight-bold text-capitalize text-info pt-5 pb-3 pl-3">{{$course->title}} course content</h5>
                    <div class="col-lg-12 pt-4 bg-light" style="height: 600px; overflow:scroll">
                        @foreach($lesson_section as $lesson_section)
                            <div class="p-3 text-capitalize bg-info">section {{$lesson_section['section_id']}}: {{$lesson_section['section_title']}}</div>
                                @foreach($lessons as $lesson)
                                    @if($lesson_section['section_id'] === $lesson->section_id)
                                        <a href="{{route('academy.playvideo', ['id' => $lesson->id, 'courseId' => $course->id, 'courseSlug' => $course->slug, 'categoryId' => $course->category->id])}}" >
                                            <div class="d-flex my-2" id="episode_display">
                                                <div>
                                                    <video attr={{$lesson->id}} attr1={{$course->id}} attr2={{$course->slug}} id="lessonVideo" src="{{asset('/storage/'.$lesson->video_episode)}}" style="height: 70px; width: 100px;"></video>
                                                    
                                                    <small class="ml-3 pr-3 pt-1 text-dark font-weight-bold text-lowercase" style="position:absolute;">
                                                        {{$lesson->title}}
                                                    </small>
                                                </div> 
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                        @endforeach
                    </div>
               </div> --}}

              
                <ul class="nav nav-tabs my-5">
                    <li class="nav-item"><a class="nav-link active text-dark font-weight-bold text-capitalize" data-toggle="tab" href="#description">Description</a></li>
                    <li class="nav-item"><a class="nav-link text-dark font-weight-bold text-capitalize" data-toggle="tab" href="#QA">Q & A</a></li>
                  </ul>
                
                  <div class="tab-content">
                    {{-- Description --}}
                    <div id="description" style="" class="tab-pane active row ml-lg-1 ml-sm-2 col-lg-12 bg-light p-5 mb-5 col-xs-12">
                        <h3 class="font-weight-bold">Description</h3>
                        <div style="text-align: justify">{!!$course->description!!}</div>
                    </div>
                    {{-- End of Description --}}

                    <div id="QA" class="tab-pane fade row ml-lg-1 ml-sm-2 col-lg-12 bg-light px-5 pb-5 mb-5 col-xs-12">
                        <h3 class="font-weight-bold my-4">Q & A</h3>
                        <div>
                            <div class="col-md-12 mb-3">
                                <div class="float-left" id="num"><h5 class="font-weight-bold text-capitalize">                                        
                                    {{$questions->count()}} questions for this course</h5></div>
                                <div class="float-right"><button id="quesBtn" class="btn gradient-sm-button gradient-button-4">Ask a question</button></div>
                                <div class="float-right"><button id="goBack" class="btn gradient-sm-button gradient-button-4">Go Back</button></div>
                            </div>

                            {{-- View All Questions and Answers --}}
                            <br><br>
                            <div class="" id="allQuestion">
                                @foreach($questions as $question)
                                {{-- Asked By --}}
                                By <span class="text-info font-weight-bold text-capitalize">{{$question->user->firstname}}&nbsp;{{$question->user->lastname}}</span>&nbsp;<span class="font-weight-bold">, {{$question->created_at->diffForHumans()}}</span>
                                {{-- End of Asked By --}}
                                    <a href="{{route('answer.show', ['questionId' => $question->id, 'courseId' => $course->id, 'categoryId' => $course->category->id])}}" class="text-info card mb-3">
                                        <div class="p-3 bg-light">
                                            <span class="font-weight-bold pr-2">&bull;</span>
                                            {{$question->title}}
                                            <div class="float-right text-danger font-weight-bold">{{$question->answers->count()}}&nbsp;@if($question->answers->count() > 1) replies @else reply
                                            @endif</div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <div class="py-5">
                                {{ $questions->links() }}
                            </div>

                            {{-- Ask a Question --}}
                            <div class="questionDiv">
                                <form action="{{route('question.store', $course)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        {{-- Course Creator Email --}}
                                        <input type="hidden" name="course_creator_email" value="{{$course->user->email}}">
                                    </div>
                                    <div>
                                        <input type="hidden" name="categoryId" value="{{$course->category->id}}">
                                    </div>
                                    <div>
                                        <input type="hidden" name="courseId" value="{{$course->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark" for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>
                                        <label>(For e.g. Getting error in lesson 3 of section 6)</label>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Content --}}
                                    <div class="form-group mt-3">
                                        <label class="font-weight-bold" for="content">Content</label>
                                        <input type="hidden" name="content"  id="content" class="form-control @error('content') is-invalid @enderror" required>
                                        <trix-editor input="content" aria-required="required"></trix-editor>
                                        <label>(For e.g. After trying what you did as 7:23 I got an error, what should I do ?)</label>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn gradient-button gradient-button-1 mt-3">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                  </div>
                  {{-- End --}}
               


               {{-- Description --}}
                {{-- <div style="" class="row ml-lg-1 ml-sm-2 col-lg-12 bg-light p-4 my-5 col-xs-12">
                    <h3 class="font-weight-bold my-4">Description</h3>
                    <div style="text-align: justify">{!!$course->description!!}</div>
                </div> --}}
                {{-- // --}}



               {{-- Comment --}}
               <div>
                    {{-- Course comments --}}
                    <div class="comment-sec-w3layouts">
                        <h4 class="leave-w3layouts">Comments</h4>
                        <ul class="list-unstyled" >
                            @foreach ($course_comments as $course_comment)
                            <li class="media my-5">
                                <img class="mr-3 img-fluid img-rounded" src="{{asset('/storage/'.$course_comment->user->image)}}" alt="{{$course_comment->user->firstname}} {{$course_comment->user->lastname}}" style="height: 40px; width: 40px;">
                                <div class="media-body shadow-sm" style="background-color: rgb(214, 213, 213)">
                                    <h5 class="mt-0 mb-1 text-info p-3 font-weight-bold text-capitalize">{{$course_comment->user->firstname}} {{$course_comment->user->lastname}}</h5>
                                    <p class="mt-1 p-3 text-dark">{{$course_comment->comment}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>



                   {{-- comment form --}}
                   <div class="comment-bottom w3pvt_mail_grid_right p-0 my-lg-5 my-4">
                       <h4 class="leave-w3layouts">Leave a Reply</h4>
                        <form action="{{route('coursecomment.store')}}" method="post">
                            @csrf
                           <div class="form-group">
                               <label>Write Message</label>
                               <textarea class="form-control" name="comment" placeholder="" required=""></textarea>
                           </div>
                           <input type="hidden" name="course_id" value="{{$course->id}}">
                           @if(auth()->user())
                            <button type="submit" class="btn gradient-button gradient-button-1 mt-3">Submit</button>
                           @else
                        </form>
                            <a href="{{route('login')}}" class="text-light">
                                <button class="btn gradient-button gradient-button-1 mt-3">Submit</button>
                            </a>
                            @endif
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- //banner-bottom -->

</div>


<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

@section('scripts')
<script>
      $(document).ready(function(){
        $('#id_label_single').select2();
    });
</script>

<script>
    const quesBtn = document.getElementById('quesBtn');
    const questionDiv = document.querySelector('.questionDiv');
    const allQuestion = document.getElementById('allQuestion');
    const num = document.getElementById('num');
    const goBack = document.getElementById('goBack');

    loadEventListeners();
    function loadEventListeners()
    {
        document.addEventListener('DOMContentLoaded', loadQues);
        quesBtn.addEventListener('click', mkQuesVisible);
        goBack.addEventListener('click', hideInput)
    }

    function loadQues()
    {
        questionDiv.style.display = 'none';
        goBack.style.display = 'none';
    }

    function mkQuesVisible()
    {
        questionDiv.style.display = 'block';
        goBack.style.display = 'block';
        allQuestion.style.display = 'none';
        num.style.display = 'none';
        quesBtn.style.display = 'none';
    }

    function hideInput()
    {
        questionDiv.style.display = 'none';
        goBack.style.display = 'none';
        quesBtn.style.display = 'block';
        allQuestion.style.display = 'block';
        num.style.display = 'block';
    }

    
</script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection



<script>
    // const lessonId = `${lesson->id}`,
    //       courseId = `${course->id}`,
    //       courseSlug = `${course->slug}`
          
    document.getElementById('lessonVideo').addEventListener('click', loadVideo);
    // const sh = $('#lessonVideo').val(data[0]);
    // console.log(sh);
    
    function loadVideo(e){
        //
        const xhr = new XMLHttpRequest();

        xhr.open('GET', `http://lms/academy/?${e.target.attr}/media/?${e.target.attr1}/?${e.target.attr2}`, true);

        xhr.onload = function(){
            if(this.status === 200){
                console.log('readystate', xhr.readyState);
                console.log(e.target);
                document.getElementById('placeVideo').innerHTML = `
                    
                `;


                console.log('yes');
            }
            else{
                console.log('no');
            }
        }

        xhr.send();

        e.preventDefault();
    }
</script>

@endsection










{{-- 
`<video src="{{ isset($playvideo) ? asset('/storage/'.$playvideo->video_episode) : asset('/storage/'.$course->intro_video) }}" controls style="width: 100%"></video>`;    
--}}

{{-- <video  src="{{ isset($playvideo) ? asset('/storage/'.$playvideo->video_episode) : asset('/storage/'.$course->intro_video) }}" controls style="width: 100%"></video> --}}
    {{-- <video src="{{ isset($playvideo) ? asset('/storage/'.$playvideo->video_episode) : asset('/storage/'.$course->intro_video) }}" id="video" class="screen mt-2" poster="" style="width: 100%"></video>
    <div class="controls mx-auto col-sm-12">
        <button class="videoBtn" id="play">
            <i class="fa fa-play fa-1x"></i>
        </button>
        <button class="videoBtn" id="stop">
            <i class="fa fa-stop fa-1x"></i>
        </button>
        <input type="range" id="progress" class="progress" min="0" max="100" step="0.1" value="0"/>
        <span class="timestamp ml-2 font-weight-bold" id="timestamp">00:00</span>
    </div> --}}