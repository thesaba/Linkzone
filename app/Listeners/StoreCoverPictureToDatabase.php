<?php

namespace Linkzone\Listeners;

use Linkzone\User;
use Linkzone\Picture;
use Linkzone\Events\CoverPictureUploaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreCoverPictureToDatabase
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
     * @param  CoverPictureUploaded  $event
     * @return void
     */
    public function handle(CoverPictureUploaded $event)
    {
        $id = Picture::create([
            'user_id' => $event->userId,
            'url' => $event->url
        ])->id;

        User::where('id', $event->userId)->update(['cover_picture_id' => $id]);
    }
}
