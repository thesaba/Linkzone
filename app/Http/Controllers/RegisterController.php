<?php

namespace Linkzone\Http\Controllers;

use Linkzone\Events\UserRegistered;
use Linkzone\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $username = strtolower('@' . $fname . $lname . rand(0, 1000));
        $email = $request->get('email');
        $password = $request->get('password');

        $user = User::create([
            'fname' => $fname,
            'lname' => $lname,
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        return redirect()->route('getLogin')->with('info', 'Registration completed successfully');
    }
}
