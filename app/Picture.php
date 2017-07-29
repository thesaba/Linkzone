<?php

namespace Linkzone;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'user_id', 'url',
    ];
}
