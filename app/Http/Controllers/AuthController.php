<?php

namespace Linkzone\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }
    
    public function index()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->get('email');
        $password = $request->get('password');
        $remember_me = ($request->get('remember_me') == 1);

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember_me))
        {
            return redirect()->route('getFeed')->with('info', 'You are now logged in');
        }

        Auth::logout();

        return redirect()->back();
    }

    public function getLogout()
    {
       Auth::logout();

        return redirect()->route('getHome');
    }
}
