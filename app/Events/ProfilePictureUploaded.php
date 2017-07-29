<?php

namespace Linkzone\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProfilePictureUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $url;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId, $url)
    {
        $this->userId = $userId;
        $this->url = $url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
