<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string'],
            'image' => ['required'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        if($request->hasFile('image'))
        {
            $image = $request->image->store('profileImage');
        }
        else
        {
            $image = 'profileImage/avatar.jpg';
        }

        return $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'image' => $image,
            'password' => Hash::make($data['password']),
        ]);

        // if($user !== null)
        // {
        //     // Send 
        //     MailController::sendVerifyEmail($data['firstname'], $data['lastname'], $data['email'], $data['verification_code']);
        //     //show msg
        //     session()->flash('success', 'Thank you for signing up, please check your email to activate your account');

        //     return redirect()->back();
        // }
        // else
        // {
        //     //show error msg
        //     session()->flash('error', 'Something went wrong!');

        //     return redirect()->back();
        // }
    }

    // Verify Email
    // public function verifyEmail(Request $request)
    // {
    //     $verification_code = \Illuminate\Support\Facades\Request::get('code');
    //     $user = User::where('verification_code', $verification_code)->first();
    //     if($user !== null)
    //     {
    //         $user->update([
    //             'is_verified' => 1,
    //         ]);
    //         $user->save();

    //         session()->flash('success', 'Account Activated, Please Login');

    //         return redirect('login');
    //     }
    //     else
    //     {
    //         session()->flash('error', 'Account not verified');

    //         return redirect('regiter');
    //     }
    // }
}
