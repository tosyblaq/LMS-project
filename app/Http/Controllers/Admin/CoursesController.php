<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;

use App\Course;
use App\Category;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/course/index')
        ->with('courses', Course::OrderBy('created_at', 'ASC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create')
        ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:courses',
            'description' => 'required',
            'category' => 'required',
            'course_image' => 'required|image',
            'intro_video' => 'required'
        ]);

        if($request->has('course_image'))
        {
            $image = $request->course_image->store('courseImage');
        }

        if($request->has('intro_video'))
        {
            $introVideo = $request->intro_video->store('courseIntroVideo');
        }

        auth()->user()->courses()->create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'category_id' => $request->category,
            'description' => $request->description,
            'image' => $image,
            'intro_video' => $introVideo
        ]);
    
        session()->flash('success', 'Courses Added Successfully');

        return redirect('admin/course');
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
    public function edit(Course $course)
    {
        return view('admin/course/edit')
        ->with('course', $course)
        ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        
        $data = $request->only(['title', 'slug', 'description', 'category_id', 'image', 'intro_video', 'published']);

        if($request->has('course_image'))
        {
            $image = $request->course_image->store('courseImage');

            //delete old image
            $course->deleteImage();
            $data['image'] = $image;
        }

        if($request->has('intro_video'))
        {
            $video = $request->intro_video->store('courseIntroVideo');

            //delete old video
            $course->deleteVideo();
            $data['intro_video'] = $video;
        }
        
        $data['slug'] = str_slug(strtolower($request->title));
        $data['category_id'] = $request->category;
        if(isset($request->published))
        {
            $data['published'] = 1;
        }
        else
        {
            $data['published'] = 0;
        }

        $course->update($data);

        session()->flash('success', 'Course Updated Successfully');

        return redirect('admin/course');
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

    //function to publish courses
    public function publish($id)
    {
        $course = Course::where('published', 0)->where('id', $id);

        if($course)
        {
            $course->update([
                'published' => 1
            ]);
            
            session()->flash('success', 'Course Published Successfully');

            return redirect('admin/course');
        }
    }

    //function to publish courses
    public function unpublish($id)
    {
        $course = Course::where('published', 1)->where('id', $id);

        if($course)
        {
            $course->update([
                'published' => 0
            ]);
            
            session()->flash('success', 'Course Unpublished Successfully');

            return redirect('admin/course');
        }
    }
}
