<?php

namespace Linkzone;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'user_id', 'parent_id', 'body',
    ];
    
    public function User()
    {
        return $this->belongsTo('Linkzone\User');
    }

    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }
    
    public function replies()
    {
        return $this->hasMany('Linkzone\Status', 'parent_id');
    }
}
