<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsReply extends Model
{
   //fillables 
   protected $fillables =[
    'post_id',
    'author',
    'email',
    'is_active',
    'body'
  ];
  //Relatioship here 

  public function comments(){
    return $this->belongsTo('App\Comments');
  }

}
