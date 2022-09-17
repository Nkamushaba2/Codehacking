<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    // creating a directory path
    protected $uploads = '/images/';

    //protected $uploads = 'images/';

    protected $fillable = ['file'];

    // use an accessor to get the photo
    public function getFileAttribute($photo){

        return $this->uploads. $photo;
    }

    // public function getFileAttribute($photo){
    //     return asset($this->uploads . $photo);
    //     }
}

