<?php

namespace Linkzone\Http\Controllers;

use Auth;
use Linkzone\User;
use Linkzone\Follower;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFollowData(Request $request)
    {
        $requestUsername = $request->get('username');
        $authenticatedUsername = Auth::user()->username;

        if ($requestUsername == $authenticatedUsername) return 'Same';

        $follower = User::where('username', $requestUsername)->first();

        for ($i = 0; $i < sizeof(Auth::user()->Followers); $i++)
        {
            if (Auth::user()->Followers[$i]->follower_id == $follower->id)
            {
                return 'Follower';
            }
        }

        return 'None';
    }
    
    public function createFollower(Request $request)
    {
        $requestUsername = $request->get('username');
        $requestedUser = User::where('username', $requestUsername)->first();


        Follower::create([
            'user_id' => Auth::user()->id,
            'follower_id' => $requestedUser->id
        ]);

        return 'Done';
    }
    
    public function getFollowing()
    {
        $users = Auth::user()->imFollowing;

        return view('following', compact('users'));
    }
    
    public function getFollowers()
    {
        $users = Auth::user()->imFollowed;

        return view('following', compact('users'));
    }
}
