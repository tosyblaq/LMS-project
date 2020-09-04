<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Lesson;
use App\CourseComment;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.academic.category')
        ->with('categories', Category::paginate(9));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function course($id)
    {
        return view('frontend.academic.course')
        ->with('courses', Course::where('category_id', $id)->get())
        ->with('category', Category::where('id', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show(Course $academy)
    public function show(Lesson $lesson, Course $academy)
    {
        // return view('frontend.academic.show')
        // ->with('course', $academy)
        // ->with('lessons', Lesson::where('course_id', $id)
        // ->where('section_title', '!=', null)
        // ->orderBy('section_id', 'asc')->orderBy('id', 'asc')->get())
        // ->with('course_comments', CourseComment::where('course_id', 2)->get());
        // return view('frontend.academic.show')
        // ->with('lessons', Lesson::where('course_id', $id)->get());
    }

    public function showcourse($category, $id)
    {
        // return view('frontend.academic.show')
        // ->with('course', $academy)
        // ->with('lessons', Lesson::where('course_id', $id)
        // ->where('section_title', '!=', null)
        // ->orderBy('section_id', 'asc')->orderBy('id', 'asc')->get())
        // ->with('course_comments', CourseComment::where('course_id', 2)->get());
        return view('frontend.academic.show')
        ->with('course', Course::where('category_id', $category))
        ->with('lessons', Lesson::where('course_id', $id)->get());
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
