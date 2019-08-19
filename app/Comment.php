<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['is_active','post_id','author','email','body', 'photo'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
