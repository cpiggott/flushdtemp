<nav>

		
	@if(Auth::check())
		
		<a href="{{ URL::route('home') }}">Home | </a>
		<a href="{{ URL::route('find-bathroom')}}">View Bathrooms | </a>
		<a href="{{ URL::route('account-sign-out') }}">Sign Out</a>
		<div>Welcome, <a href="/user/account/<?php echo Auth::user()->id?>">{{Auth::user()->user_name}}</a></div>
	@else
		<a href="{{ URL::route('home') }}">Home | </a>
		<a href="{{ URL::route('account-sing-in') }}">Sign In | </a>
		<a href="{{ URL::route('account-create') }}">Create Account</a>
	@endif

</nav>