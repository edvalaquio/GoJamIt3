<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;

class ProfileController extends Controller
{

    public function __construnct(){
        $this->middleware('auth');
    }

    public function profile($username){
    	$user = User::whereUsername($username)->first();
    	return view('user.profile',compact('user'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($username)
    {
        //
        $user = User::whereUsername($username)->first();
        return view('user.settings',compact('user'));
    }

    public function about($username)
    {
        $user = User::whereUsername($username)->first();
        return view('user.about',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $user->update($request->all());
        $username = $request['username'];

        return redirect()->route('profile', [$username]);
    }

    public function returnDiscover($username){
        $user = User::whereUsername($username)->first();
        return view('discover.discover',compact('user'));
        // return view('discover.discover');
    }

    public function followUser($username){
        $follow = new Follow;
          $user_id= User::whereUsername($username)->first()->id;


        $follow->following_id = $user_id;
        $follow->follower_id= Auth::user()->id;
        $follow->save();

        $user=User::find($user_id);
        $followers = array();

         foreach($user->followers as $follower_user){
            $follower_array[] = array(
                'username'=>$follower_user->follower->username,
                 'name'=>$follower_user->follower->fname
             );
         } 

        // $user = User::whereUsername($username)->first();



        //return view('user.profile',compact('user'));
        return $follower_array;
        // return redirect()->route('profile', [$username]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
