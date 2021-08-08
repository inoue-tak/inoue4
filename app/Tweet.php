<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
    protected $fillable = [
        'user_id', 'tweet',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function likedBy($user)
    {
        return Like::where('user_id', $user->id)->where('tweet_id', $this->id);
    }
}
