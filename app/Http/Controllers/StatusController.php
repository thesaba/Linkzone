<?php

namespace Linkzone\Http\Controllers;

use Auth;
use Linkzone\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postStatus(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        Auth::user()->Statuses()->create([
            'body' => $request->get('body')
        ]);

        return 'Done';
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            'reply-' . $statusId => 'required|max:1000'
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) return redirect()->route('getHome');

        $reply = Status::create([
            'body' => $request->get('reply-' . $statusId)
        ])->User()->associate(Auth::user());

        $status->replies()->save($reply);

        return redirect()->back();
    }

    public function getDeleteStatus($statusId, $userId)
    {
        if ($userId == Auth::user()->id)
        {
            Status::where('id', $statusId)->delete();
        }

        return redirect()->back();
    }
}
