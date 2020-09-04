<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Answer;
use App\Question;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question)
    {
        $q = Question::find($question);
        // dd($q);

        auth()->user()->answers()->create([
            'category_id' => $request->courseId,
            'course_id' => $request->categoryId,
            'question_id' => $request->questionId,
            'content' => $request->content,
            'published' => 1,
        ]);

        // question creator email
        $question_creator = $request->question_creator_email;

        // Sending Notification to a Single mail
        Notification::route('mail', $question_creator)->notify(new \App\Notifications\NewAnswerAdded($q));

        session()->flash('success', 'Answer Submitted Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($questionId, $courseId, $categoryId)
    {
        return view('frontend.academic.showAnswer')
        ->with('question', Question::where('id', $questionId)->first())
        ->with('answers', Answer::where('question_id', $questionId)->where('course_id', $courseId)->where('category_id', $categoryId)->where('published', 1)->orderBy('created_at', 'DESC')->simplePaginate(3));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
