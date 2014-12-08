<nav>

		
	@if(Auth::check())
		
		<a href="{{ URL::route('home') }}">Home | </a>
		<a href="{{ URL::route('find-bathroom')}}">View Bathrooms | </a>
		<a href="{{ URL::route('account-sign-out') }}">Sign Out</a>
		<div>Welcome, {{Auth::user()->user_name}}</div>
	@else
		<a href="{{ URL::route('home') }}">Home | </a>
		<a href="{{ URL::route('account-sing-in') }}">Sign In | </a>
		<a href="{{ URL::route('account-create') }}">Create Account</a>
	@endif

</nav>