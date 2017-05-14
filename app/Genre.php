<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //

	 public function user(){
        return $this->belongsToMany('App\User','user_genres','genre_id','user_id');
    }

    //  protected $fillable = [
    //  'user_id','genre_id'
    // ];
}
