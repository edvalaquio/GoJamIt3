<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'birthdate', 'username','sex','password','latitude','longitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers(){
        return $this->hasMany('App\Follow','following_id','id');
    }

    public function following(){
        return $this->hasMany('App\Follow','follower_id','id');
    }

    public function genres(){
        return $this->belongsToMany('App\Genre','user_genres','user_id','genre_id');
    }

    public function instruments(){
         return $this->belongsToMany('App\Instrument','user_instruments','user_id','instrument_id');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

   public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
}
