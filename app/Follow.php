<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    public function follower(){
    	return $this->belongsTo('App\User','follower_id','id');
    }

    public function following(){
    	return $this->belongsTo('App\User','following_id','id');
    }


    protected $fillable = [
    'following_id', 'follower_id'
    ];
}
