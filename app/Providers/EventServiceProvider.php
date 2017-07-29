<?php

namespace Linkzone\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Linkzone\Events\ProfilePictureUploaded' => [
            'Linkzone\Listeners\StoreProfilePictureToDatabase',
        ],
        'Linkzone\Events\CoverPictureUploaded' => [
            'Linkzone\Listeners\StoreCoverPictureToDatabase',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
