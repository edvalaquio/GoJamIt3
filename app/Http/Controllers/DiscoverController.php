<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DiscoverController extends Controller
{
    //
    public function index(Request $request, $username){

    	$user = User::whereUsername($username)->first();
    	$user = User::findOrFail($user->id);
     	// $user->update(number_format($request->input('latitude'),8,'.',''));
     	$user['latitude'] = (number_format($request->latitude,8,'.',''));
     	$user['longitude'] = (number_format($request->longitude,8,'.',''));
    	$user->update();
    	return "Latitude: ".$user['latitude'] . " Longitude: ".$user['longitude'];
    }

}
