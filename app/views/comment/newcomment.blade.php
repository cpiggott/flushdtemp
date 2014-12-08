@extends('layout')

@section('content')

	<form action="/bathroom/view/newcomment" method="post" >

		<div class="field">
			Comment(max: 140 characters): <input type="text" name="comment" maxlength="140">
		</div>
		<input type="hidden" name="code" value="<?php echo $code;?>" />

		<input type="submit" value="Submit">
		{{ Form::token() }}

	</form>
@stop