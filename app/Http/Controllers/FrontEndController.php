<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course;
use App\Lesson;
use App\FrontPageHeader;
use App\Jumbotron;
use App\FrontEndSecondParagraph;
use App\LiveTheExperience;
use App\GetStarted;
use App\Testimonial;
use App\CompanyDetail;
use App\StudentTestimonial;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')
        ->with('categories', Category::orderBy('id', 'asc')->take(6)->get())
        ->with('courses', Course::all())
        ->with('lessons', Lesson::all())
        ->with('frontheader', FrontPageHeader::all()->take(1))
        ->with('jumbo', Jumbotron::all()->take(1))
        ->with('secondpara', FrontEndSecondParagraph::all()->take(1))
        ->with('lives', LiveTheExperience::all())
        ->with('getstarted', GetStarted::all()->take(1))
        ->with('testimony', Testimonial::all()->take(1))
        ->with('student_testimony', StudentTestimonial::where('published', 1)->take(1)->get())
        ->with('company_detail', CompanyDetail::all());
    }

    //function to display users application form
    public function apply()
    {
        if(auth()->user())
        {
            return view('admin/dashboard');
        }
        else
        {
            return view('auth/apply');
        }
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
    public function destroy($id)
    {
        //
    }
}
