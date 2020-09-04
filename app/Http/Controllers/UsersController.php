<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Profile;
use App\Storage;
use Auth;

class UsersController extends Controller
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
        return view('admin/users/index')
        ->with('users', User::all());
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
    public function edit(User $user)
    {
        //$profile = Profile::where('user_id', auth()->user()->id);
        if(Auth::user() == $user)
        {
            return view('user', compact('user', 'profile'));
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function updat(Request $id)
     {
         //
     }


    public function update(Request $request, User $user, Profile $profile)
    {
        $this->validate($request, [
            'image' => 'image',
        ]);

        $data = $request->only(['image']);

        if($request->hasFile('image'))
        {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            
            if($fileNameWithExt !== 'avatar.jpg')
            $image = $request->image->store('profileImage');
            {
                $image = $request->image->store('profileImage');
                //delete old image
                $user->deleteImage();
            }

            $data['image'] = $image;
        }
        //update image
        $user->update($data);
        
        //profile
        $data1 = $request->only(['address', 'city', 'country', 'postal_code', 'about']);
        //if user has profile do update
        if($user->profile)
        {
            $user->profile->save([
                'address' => strtolower($request->address),
                'city' => strtolower($request->city),
                'country' => strtolower($request->country),
                'about' => strtolower($request->about),
                'postal_code' => $request->postal_code
            ]);

            $user->profile->update($data1);
        }
        //else create profile for auth()->user()
        else
        {
            $user->profile()->create([
                'address' => strtolower($request->address),
                'city' => strtolower($request->city),
                'country' => strtolower($request->country),
                'about' => strtolower($request->about),
                'postal_code' => $request->postal_code,
            ]);
                
            $user->save();
        }
                
        session()->flash('success', 'Profile Updated Successfully');
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
