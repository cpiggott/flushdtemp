@extends('layout')

@section('content')
<br>
<br>

	<form action="/bathroom/rate/newrate" method="post" >

		<div class="field">
			Rating: <select name="rating">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
					</select>
		</div>

		<input type="hidden" name="code" value="<?php echo $code;?>" />
<br>
		<input type="submit" value="Submit">
		{{ Form::token() }}

	</form>
@stop