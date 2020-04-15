<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commenter;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    public function hasRole($role){
        $roles = $this->roles()->where('name', $role)->count();
        if($roles == 1){
            return true;
        }
        return false;
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    /**
    * Get the user comment'
    */
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    /**
    * Get the user posts'
    */
   public function posts()
   {
       return $this->hasMany('App\Post');
   }


}
