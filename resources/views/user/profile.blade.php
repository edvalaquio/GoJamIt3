@extends('layouts.app')

@section('head')

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="profile-header row">
        <div class="profile-image"> 
            @if($user->prof_pic == null)
            <img src="/img-uploads/maleDefault.png"/>
            @else
            <img src="{{$user->prof_pic}}"/>
            @endif
        </div>
        <div class="profile-name">
          <h1>{{ $user->fname }}</h1>
          <h2>{{ $user->username }}</h2>
        </div>    
    </div>
    @yield('details')
</div>
@endsection