<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    //
    public function user(){
        return $this->belongsToMany('App\User','user_instruments','instrument_id','user_id');
    }

}
