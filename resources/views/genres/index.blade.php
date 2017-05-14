@extends('layouts.app')

@section('title', '|All Genres')

@section('content')


<div class="row">
	<div class="col-md-8">
	<h1> Genres </h1>
	@foreach ($user-> as $use)
	<p> {{$use->fname}} </p>
	@endforeach
	</div>
</div>