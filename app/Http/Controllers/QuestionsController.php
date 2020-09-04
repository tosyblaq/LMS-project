<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Question;
use App\Answer;
use App\Course;
use App\Category;

class QuestionsController extends Controller
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
    public function store(Request $request, $course)
    {
        // $this->validate($request, [
        //     'user_id' => 'required',
        //     'title' => 'required',
        //     'content' => 'required',
        // ]);
        
        $c = Course::find($course);
        // dd($c->title);

        auth()->user()->questions()->create([
            'category_id' => $request->categoryId,
            'course_id' => $request->courseId,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'published' => 1,
        ]);

        // Course Creator Email
        $course_creator = $request->course_creator_email;
        
        // Sending Notification to a Single mail
        Notification::route('mail', $course_creator)->notify(new \App\Notifications\NewQuestionAdded($c));

        session()->flash('success', 'Questions Submitted, Instructor will get back to you as soon as possible');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
