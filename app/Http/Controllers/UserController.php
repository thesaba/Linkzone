<?php

namespace Linkzone\Http\Controllers;

use Auth;
use Linkzone\Events\CoverPictureUploaded;
use Linkzone\Events\PicturesUploaded;
use Linkzone\Events\ProfilePictureUploaded;
use Linkzone\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile-update');
    }
    
    public function postUpdateProfile(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required'
        ]);

        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $username = $request->get('username');

        if ($username[0] != '@') $username = '@' . $username;

        User::where('id', '=', Auth::user()->id)->update([
            'fname' => $fname,
            'lname' => $lname,
            'username' => $username
        ]);

        return redirect()->route('getUpdateProfile')->with('info', 'Your profile has been successfully updated');
    }
    
    public function postUpdatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $password = bcrypt($request->get('password'));

        User::where('id', '=', Auth::user()->id)->update([
            'password' => $password
        ]);

        return redirect()->route('getUpdateProfile')->with('info', 'Password has been successfully changed');
    }
    
    public function postUpdateProfilePicture(Request $request)
    {
        if ($request->hasFile('profile_picture'))
        {
            if ($request->file('profile_picture')->isValid())
            {
                $file = $request->file('profile_picture');
                $name = time() . '.' . $file->getClientOriginalExtension();

                $request->file('profile_picture')->move('UploadedPictures', $name);

                event(new ProfilePictureUploaded(Auth::user()->id, asset('UploadedPictures/' . $name)));
            }
        }

        return redirect()->route('getUpdateProfile')->with('info', 'Successfully uploaded');
    }

    public function postUpdateProfileCover(Request $request)
    {
        if ($request->hasFile('cover_picture'))
        {
            if ($request->file('cover_picture')->isValid())
            {
                $file = $request->file('cover_picture');
                $name = time() . '.' . $file->getClientOriginalExtension();

                $request->file('cover_picture')->move('UploadedPictures', $name);

                event(new CoverPictureUploaded(Auth::user()->id, asset('UploadedPictures/' . $name)));
            }
        }

        return redirect()->route('getUpdateProfile')->with('info', 'Successfully uploaded');
    }
    
    public function getUserProfile($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) abort(404);

        return view('user-profile', compact('user'));
    }
}
