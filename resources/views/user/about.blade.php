@extends('user.profile')

@section('details')

<div class="row">
    <div class="profile-mini-nav nav nav-tabs">
        <li class="active"><a href="/profile/{{$user->username}}/about">About</a></li>
        <li><a href="#" class="">Posts</a></li>
        <a href="/profile/follow/{{$user->username}}" data-pg="{{ $user->username}}" class="pull-right btn btn-primary">Follow</a>
    </div>
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
    	<div class="about-information"></div>
    </div>
</div>

@if(($user->id)!=(Auth::user()->id))
<a id="follow-unfollow" href="javascript:void(0)" data-pg="{{ $user->username}}" class="follow-user ">
Follow </a>

@endif

<h2> Genres Listened To </h2>
<ul>
@foreach($user->genres as $genre)
<li> {{$genre->genre}} </li>
@endforeach
</ul>

<h2> Instruments Played </h2>
<ul>
@forelse($user->instruments as $instrument)
<li> {{$instrument->instrument}} </li>
@empty
none
@endforelse
</ul>

<a href="#" id="followers-count-{{$user->username}}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followerModal_{{$user->username}}" >
{{ $user->followers->count() }} Follower(s)
</a>

<a href="#" id="following-count-{{$user->username}}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followingModal_{{$user->username}}" >
{{ $user->following->count() }} Following
</a>
<!-- "javascript:void(0)" -->

<!-- Modal -->
<div class="modal fade" id="followerModal_{{$user->username}}" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Followers</h4>
</div>
<div class="modal-body">
<p>
@forelse($user->followers as $follower)
<div>
<a href="/profile/{{ $user->where('id',$follower->follower_id)->value('username') }}">{{ $user->where('id',$follower->follower_id)->value('fname') }}</a>
</div>
@empty
no followers
@endforelse
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!--  END OF MODAL -->

<!-- Modal -->
<div class="modal fade" id="followingModal_{{$user->username}}" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Following</h4>
</div>
<div class="modal-body">
<p>
@forelse($user->following as $following)
<div>
<a href="/profile/{{ $user->where('id',$following->following_id)->value('username') }}">{{ $user->where('id',$following->following_id)->value('fname') }}</a>
</div>
@empty
None
@endforelse
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!--  END OF MODAL -->

@endsection