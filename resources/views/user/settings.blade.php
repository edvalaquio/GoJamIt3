@extends('layouts.app')

@section('head')
<link href="{{ asset('css/settings.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection



@section('content')
<div class="text-center" style="padding:50px 0">
	<div class="logo">Edit Profile Info</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left" action="/user/settings/{{ $user->id }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<div class="form-group">
						<label for="lg_username" class="sr-only">First name</label>
						<input type="text" class="form-control" name="fname" value="{{ $user->fname }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Last name</label>
						<input type="text" class="form-control" name="lname" value="{{ $user->lname }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" name="username" value="{{ $user->username }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Email</label>
						<input type="text" class="form-control" name="email" value="{{ $user->email }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Password</label>
						<input type="password" class="form-control" name="password" value="{{ $user->password }}" />
					</div>
					
				</div>
				<button type="submit" class="login-button" value="Save"><i class="fa fa-chevron-right"></i></button>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>
@endsection