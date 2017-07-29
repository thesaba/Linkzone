<?php

namespace Linkzone\Http\Controllers;

use Auth;
use Linkzone\Status;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFeed()
    {
        return view('feed');
    }

    public function getStatuses()
    {
        return Status::notReply()->where(function($query) {
            return $query->where('user_id', Auth::user()->id)
                ->orWhereIn('user_id', Auth::user()->imFollowing->pluck('id'));
        })->orderBy('created_at', 'desc')->with('user', 'replies.user')->get()->toJson();
    }
}
