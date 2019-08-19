<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = ['is_active','comment_id','author','email','body','photo'];


    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
