<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentTestimonial;
use Auth;

class StudentTestimonialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student/index')
        ->with('testimonies', StudentTestimonial::all());
    }

    public function admin()
    {
        return view('admin/testimonial/student_testimonial')
        ->with('testimonies', StudentTestimonial::all());
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
    public function destroy(StudentTestimonial $student_testimonial)
    {
        $student_testimonial->delete();

        session()->flash('success', 'Testimonial Deleted Successfully');

        return redirect()->back();
    }

    //function to publish testimonial
    public function publish($id)
    {
        $testimonial = StudentTestimonial::where('published', 0)->where('id', $id);

        if($testimonial)
        {
            $testimonial->update([
                'published' => 1
            ]);
            
            session()->flash('success', 'Testimonial Published Successfully');

            return redirect()->back();
        }
    }

    //function to unpublish testimonial
    public function unpublish($id)
    {
        $testimonial = StudentTestimonial::where('published', 1)->where('id', $id);

        if($testimonial)
        {
            $testimonial->update([
                'published' => 0
            ]);
            
            session()->flash('success', 'Testimonial Unpublished Successfully');

            return redirect()->back();
        }
    }

}
