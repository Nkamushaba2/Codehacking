<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
   // protected  $fillables =['user_id','photo_id','category_id','title','body'];
    protected $fillable = [
        'user_id',
        'photo_id',
        'category_id',
        'title',
        'body',
       
    ];
    // create relationship post to user
    public function user(){

        return $this->belongsTo('App\User');
    }
    // create relationship with Photos
    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    //category 
    public function category(){
        return $this->belingsTo('App\Category');
    }
}
