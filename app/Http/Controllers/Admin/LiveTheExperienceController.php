<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\LiveTheExperience;

class LiveTheExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.livetheExperience.index')
        ->with('lives', LiveTheExperience::all());
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
    public function edit(LiveTheExperience $live)
    {
        return view('admin.livetheExperience.edit')
        ->with('live', $live);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiveTheExperience $live)
    {
        $this->validate($request, [
            'tag' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        //if request has image
        if($request->has('image'))
        {
            //if the $live->image(i.e image you want to replace) equals 'frontendImage/n1.jpg || frontendImage/n2.jpg || frontendImage/n3.jpg'
            if(($live->image == 'frontendImage/n1.jpg') || ($live->image == 'frontendImage/n2.jpg') || ($live->image == 'frontendImage/n3.jpg'))
            {
                //assign the image to a variable and store the image in 'frontendImage' folder
                $image = $request->image->store('frontendImage');
                
            }
            //else
            else
            {
                //assign the image to a variable and store the image in 'frontendImage' folder
                $image = $request->image->store('frontendImage');
                //delete $live->image(i.e image you want to replace)
                $live->deleteImage();
            }
            //update $request
            $live->update([
                'tag' => $request->tag,
                'title' => $request->title,
                'body' => $request->body,
                'image' => $image,
            ]);

        }
        //else $request has no image
        else
        {
            //update $request
            $live->update([
                'tag' => $request->tag,
                'title' => $request->title,
                'body' => $request->body,
            ]);
        }

        session()->flash('success', 'Live Experience Section Updated Successfully');

        return redirect('admin/live');
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
