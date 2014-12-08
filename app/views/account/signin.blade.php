@extends('layout')

@section('content')

	<form action="/account/signin" method="post" >
		<div class="field">
			Email: <input type="text" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}>
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>

		<div class="field">
			Password: <input type="password" name="password"{{ (Input::old('lname')) ? ' value="' . e(Input::old('lname')) . '"' : '' }}>
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>

		<input type="submit" value="Create Account">
		{{ Form::token() }}

	</form>
@stop