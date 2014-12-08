@extends('layout')

@section('content')
	@if(Auth::check())
			<div>What are you looking for?<div>
	@else
		Welcome to Flushd, please sign in or create and account above!
	@endif
@stop