<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseComment;

class CourseCommentsController extends Controller
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
        
    }

    public function admin()
    {
        return view('admin.testimonial.admin_view_comment')
        ->with('comments', CourseComment::all());
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
        $this->validate($request, [
            'comment' => 'required',
        ]);

        // auth()->user()->comments()->create([
        //     'course_id' => $request->course_id,
        //     'comment' => $request->comment,
        // ]);

        $data = CourseComment::create([
            'course_id' => $request->course_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ]);

        $data->save();

        session()->flash('success', 'Thanks for your response');

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
    public function deleteComment($id)
    {
        $comment = CourseComment::where('id', $id);

        if($comment)
        {
            $comment->delete();
        }

        session()->flash('success', 'Comment Deleted Successfully');

        return redirect()->back();
    }

    //function to publish comment
    public function publish($id)
    {
        $comment = CourseComment::where('published', 0)->where('id', $id);

        if($comment)
        {
            $comment->update([
                'published' => 1
            ]);
            
            session()->flash('success', 'Comment Published Successfully');

            return redirect()->back();
        }
    }

    //function to unpublish comment
    public function unpublish($id)
    {
        $comment = CourseComment::where('published', 1)->where('id', $id);

        if($comment)
        {
            $comment->update([
                'published' => 0
            ]);
            
            session()->flash('success', 'Comment Unpublished Successfully');

            return redirect()->back();
        }
    }
}
