<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fName', 'lName', 'state', 'city', 'zipcode', 'school_id',
        'orgName', 'adminEmail', 'payPalEmail', 'eventSubmissions', 'premiumSubmissions', 'accountType',
        'category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events()
    {

      return $this->hasMany(Event::class);


    }

    public function payments()
    {
      return $this->hasMany(Payment::class);
    }

    public function school()
    {
      return $this->belongsTo(School::class);
    }

    public function likedPosts()
    {
        return $this->morphedByMany('App\Post', 'likes')->whereDeletedAt(null);
    }
}
