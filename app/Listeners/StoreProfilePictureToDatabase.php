<?php

namespace Linkzone\Listeners;

use Linkzone\User;
use Linkzone\Picture;
use Linkzone\Events\ProfilePictureUploaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreProfilePictureToDatabase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProfilePictureUploaded  $event
     * @return void
     */
    public function handle(ProfilePictureUploaded $event)
    {
        $id = Picture::create([
            'user_id' => $event->userId,
            'url' => $event->url
        ])->id;

        User::where('id', $event->userId)->update(['profile_picture_id' => $id]);
    }
}
