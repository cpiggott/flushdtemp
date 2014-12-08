@extends('layout')

@section('content')
	@if(Auth::check())
	<form action="/bathroom/find" method="post" >
		<div class="field">
			Street Number: <input type="text" name="address">
		</div>

		<div class="field">
			City: <input type="text" name="city"{{ (Input::old('city')) ? ' value="' . e(Input::old('city')) . '"' : '' }}>
		</div>

		<div class="field">
			State: <input type="text" name="state"{{ (Input::old('state')) ? ' value="' . e(Input::old('state')) . '"' : '' }}>
		</div>

		<input type="submit" value="Find My Throne">
		{{ Form::token() }}

	</form>
	@else
		Welcome to Flushd, please sign in or create an account above!
	@endif
@stop