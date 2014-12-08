@extends('layout')

@section('content')
<div class="jumbotron text-center">
   <div class="container">
	@if(Auth::check())

	

	<h2>Find Your Throne</h2>
	<form action="/bathroom/find" method="post" >
		<p>Street Number: </p>
		<div class="field form-group">
			<input type="text" name="address">
		</div>
		<p>City:</p>
		<div class="field form-group" >
			 <input type="text" name="city"{{ (Input::old('city')) ? ' value="' . e(Input::old('city')) . '"' : '' }}>
		</div>

		<p>State:</p>
		<div class="field ">
			 <input type="text" name="state"{{ (Input::old('state')) ? ' value="' . e(Input::old('state')) . '"' : '' }}>
		</div>
		<br>
		<br>

		<input type="submit" value="Find My Throne">
		{{ Form::token() }}

	</form>


	@else
		Welcome to Flushd, please sign in or create an account above!
	@endif
	</div>
</div>
@stop