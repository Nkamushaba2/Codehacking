<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //fillables 
    protected $fillable= [
         'post_id',
         'author',
         'email',
         'file',
         'photo',
         'is_active',
         'body'
    ];

    //Reply comments relationship

    public function replies(){
        return $this->HasMany('App\CommentsReply');
    }
    // relation to post

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
