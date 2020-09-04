<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\FrontEndSecondParagraph;

class FrontEndSecondParaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.secondparagraph.index')
        ->with('secondparas', FrontEndSecondParagraph::all());
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
    public function update(Request $request, FrontEndSecondParagraph $secondpara)
    {
        //validattion
        $this->validate($request, [
            'tag' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        //if request has image
        if($request->has('image'))
        {
            //if image to be replaced == frontendImage/ab.jpg don't delete
            if($secondpara->image == 'frontendImage/ab.jpg')
            {
                //assign the image to a variable and store in a 'frontImage' folder
                $image = $request->image->store('frontendImage');
                
            }
            //else delete
            else
            {
                //assign the image to a variable and store in a 'frontImage' folder
                $image = $request->image->store('frontendImage');
                $secondpara->deleteImage();
            }

            $secondpara->update([
                'tag' => $request->tag,
                'title' => $request->title,
                'body' => $request->body,
                'image' => $image,
            ]);

            $secondpara->save();
        }
        //else request has no image
        else
        {
            $secondpara->update([
                'tag' => $request->tag,
                'title' => $request->title,
                'body' => $request->body,
            ]);

            $secondpara->save();
        }

        session()->flash('success', 'Second Paragraph Updated Successfully');
        return redirect()->back();
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
