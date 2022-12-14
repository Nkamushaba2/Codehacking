<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','is_active','role_id','file',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relationship
    public function role()
    {
         return $this->belongsTo('App\Role');
    }

    // relationship for photo
    public function photo(){

        return $this->belongsTo('App\Photo');
    }
//encrypt password is not empty
public function setPasswordAttributes($password){
    if(!empty($passwor)){
        $this->attributes['password']=bcrypt($password);
    }
}
    // method to validate roles
    public function isAdmin(){
        //if($this->role->name=="Admin" && $this->is_active==1)
        if($this->role->name == "Admin" && $this->is_active == 1) 
        {
            
            return true;
        }
       
            return false;
       
    }
// Relationship for users to posts
public function posts(){
    return $this->hasMany('App\Post');
}



}
