<?php

namespace Linkzone;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id', 'follower_id',
    ];

    public function User()
    {
        return $this->belongsTo('Linkzone\User');
    }
}
