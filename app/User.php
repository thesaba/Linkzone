<?php

namespace Linkzone;

use Auth;
use Linkzone\Picture;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'fname', 'lname', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function Picture()
    {
        return $this->hasMany('Linkzone\Picture');
    }

    public function Followers()
    {
        return $this->hasMany('Linkzone\Follower');
    }

    public function imFollowing()
    {
        return $this->belongsToMany('Linkzone\User', 'followers', 'user_id', 'follower_id');
    }

    public function imFollowed()
    {
        return $this->belongsToMany('Linkzone\User', 'followers', 'follower_id', 'user_id');
    }
    
    public function Statuses()
    {
        return $this->hasMany('Linkzone\Status', 'user_id');
    }

    public static function getFullName()
    {
        return Auth::user()->fname . ' ' . Auth::user()->lname;
    }

    public static function getProfilePicture(User $user)
    {
        $picture = Picture::find($user->profile_picture_id);

        if (! $picture) return '';

        return $picture->url;
    }

    public static function getCoverPicture(User $user)
    {
        $picture = Picture::find($user->cover_picture_id);

        if (! $picture) return '';

        return $picture->url;
    }
}
