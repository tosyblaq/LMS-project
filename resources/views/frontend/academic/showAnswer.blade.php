@extends('layouts.front')

@section('style')
{{-- highlight css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.3/styles/atom-one-dark.min.css">
@endsection

@section('content')
<div class="bg-light container mt-3 mb-5">
    <div class="col-md-10 mx-auto py-3">
        <span class="text-info">Question</span>
        <div class="card mt-2">
            <div class="card-header">{!!$question->title!!}</div>
            <div class="card-body">{!!$question->content!!}</div>
        </div>

        <br>
        <span class="font-weight-bold text-center mx-auto">Answers</span>
        <br><br>
        <div>
            <div>
                @forelse($answers as $answer)
                By <span class="text-info font-weight-bold text-capitalize">{{$answer->user->firstname}}&nbsp;{{$answer->user->lastname}}</span>&nbsp;<span class="font-weight-bold">, {{$answer->created_at->diffForHumans()}}</span> 
                <div class="card px-4 my-2">
                    <div class="card-body row">
                        <span class="font-weight-bold pr-2">&bull;</span>{!!$answer->content!!}
                    </div>
                </div>
                @empty
                <span class="text-info">No Answers</span>
                @endforelse
            </div>

            <div class="py-5">
                {{$answers->links()}}
            </div>

            <h4 class="font-weight-bold mt-5">Add an Answer</h4>
            <form action="{{route('answer.store', $question)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="hidden" name="question_creator_email" value="{{$question->user->email}}">
                </div>
                <div>
                    <input type="hidden" name="questionId" value="{{$question->id}}">
                </div>
                <div>
                    <input type="hidden" name="categoryId" value="{{$question->category_id}}">
                </div>
                <div>
                    <input type="hidden" name="courseId" value="{{$question->course_id}}">
                </div>
                <div class="form-group mt-3">
                    <label class="font-weight-bold" for="content">Content</label>
                    <input type="hidden" name="content" id="content" class="form-control @error('content') is-invalid @enderror">
                    <trix-editor input="content"></trix-editor>
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
@endsection


@section('scripts')
<script>
      $(document).ready(function(){
        $('#id_label_single').select2();
    });

    {{-- highlight js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection


