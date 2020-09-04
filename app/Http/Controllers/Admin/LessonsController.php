<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;
use App\Lesson;
use App\Section;

class LessonsController extends Controller
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
        //$course = Course::find($id);
        return view('admin/lesson/create');
    }

    public function create_lesson($course)
    {
        $lessons = Lesson::where('course_id', $course)->OrderBy('section_id', 'asc')
        ->OrderBy('title', 'asc')->get();
        $course = Course::find($course);
        //dd($course);
        return view('admin/lesson/create_lesson')
        ->with('course', $course)
        ->with('sections', Section::all())
        ->with('lessons', $lessons);
    }

    public function view_lesson($course)
    {
        $lessons = Lesson::where('course_id', $course)->OrderBy('section_id', 'ASC')
        ->OrderBy('title', 'ASC')->get();
        // $course = Course::find($course);
        //dd($course);
        return view('admin/lesson/view_lesson')
        // ->with('course', $course)
        ->with('sections', Section::all())
        ->with('lessons', $lessons);
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
            'section' => 'required',
            'section_title' => 'required',
        ]);
        
        if($request->has('file'))
        {
            // get file Extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $video = $request->file->store('videoLesson');
            
        }
        
        // get fileName
        // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME),
        // dd($fileNameWithExt);
        // dd($fileNameWithExt);
        //$course = Course::findOrFail($course);
        $lesson = Lesson::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
            'video_episode' => $video,
            'section_id' => $request->section,
            'section_title' => $request->section_title,
            'title' => $fileName,
            'slug' => strtolower(str_slug($fileName)),
        ]);
        $lesson->save();
            
        
        //session()->flash('success', 'Lessons Added Successfully');
            
        //return redirect('admin/course/index');

        //return response()->json(["status" => "success"]);

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
    public function edit(Lesson $lesson)
    {
        return view('admin/lesson/edit')
        ->with('lesson', $lesson)
        ->with('sections', Section::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $this->validate($request, [
            'title' => 'required',
            'section' => 'required',
        ]);

        $data = $request->only(['title', 'slug', 'section_id', 'video_episode', 'free_episode', 'published']);

        if($request->has('video_episode'))
        {
            $video = $request->video_episode->store('videoLesson');

            //delete old video
            $lesson->deleteVideo();
            $data['video_episode'] = $video;
        }

        $data['slug'] = strtolower(str_slug($request->title));
        $data['section_id'] = $request->section;
        if(isset($request->published))
        {
            $data['published'] = 1;
        }
        else
        {
            $data['published'] = 0;
        }

        if(isset($request->free_episode))
        {
            $data['free_episode'] = 1;
        }
        else
        {
            $data['free_episode'] = 0;
        }

        $lesson->update($data);

        session()->flash('success', 'Lesson Updated Successfully');

        return redirect('admin/lesson/create_lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $lesson->deleteVideo();

        session()->flash('success', 'Lesson Deleted Successfully');

        return redirect()->back();
    }

    //function to publish lesson
    public function publish($id)
    {
        $lesson = Lesson::where('published', 0)->where('id', $id);

        if($lesson)
        {
            $lesson->update([
                'published' => 1
            ]);
            
            session()->flash('success', 'Lesson Published Successfully');

            return redirect()->back();
        }
    }

    //function to publish lesson
    public function unpublish($id)
    {
        $lesson = Lesson::where('published', 1)->where('id', $id);

        if($lesson)
        {
            $lesson->update([
                'published' => 0
            ]);
            
            session()->flash('success', 'Lesson Unpublished Successfully');

            return redirect()->back();
        }
    }

    //Function to make a lesson free on the view_lesson.blade.php page
    public function make_free($id)
    {
        $lesson = Lesson::where('free_episode', 0)->where('id', $id);

        if($lesson)
        {
            $lesson->update([
                'free_episode' => 1
            ]);
            
            session()->flash('success', 'Lesson Made Free Successfully');

            return redirect()->back();
        }
    }

    public function make_not_free($id)
    {
        $lesson = Lesson::where('free_episode', 1)->where('id', $id);

        if($lesson)
        {
            $lesson->update([
                'free_episode' => 0
            ]);
            
            session()->flash('success', 'Lesson Made Not Free Successfully');

            return redirect()->back();
        }
    }
    
}
