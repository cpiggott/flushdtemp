@extends('layout')

@section('content')
<div class="jumbotron text-center">
   <div class="container">

   <h3>Users Comments</h3>
		<?php 
				$comments = DB::select(DB::raw("SELECT * FROM comments WHERE user_id = '$tempUser->id'") );
			?>

			<?php $counter = 1;
	   		 $initial = 0;
	   		 $arrayCount = 0; ?>
	   		@foreach($comments as $comment)
	   			<?php $arrayCount++; ?>
	   			@if($counter % 3 == 0 || $initial == 0 )
	   			<?php $initial = 1;?>
			  	<div class="row">
			  	@endif
					<div class="col-sm-6 col-md-4">
			    		<div class="thumbnail">
			      			<div class="caption">
								<h3>{{$comment->message}}</h3>
					    		<?php $tempUser = DB::select(DB::raw("SELECT x.user_name, x.id FROM users x, comments y WHERE y.id = '$comment->id' AND y.user_id = x.id" ) ); ?>
					    		<p>Written by: <a href="/user/account/<?php echo $tempUser[0]->id; ?>">{{$tempUser[0]->user_name}}</a> </p>
					    		<p>Likes: {{$comment->likes}}</p>
					    		<p><a href="/bathroom/view/<?php echo $comment->wall_id?>">View Bathroom</a></p>
			        		</div>
			    		</div>
			  		</div>
			  	@if($counter % 3 == 0)
			  	</div>
			  	@endif
			  	<?php $counter++; ?>
	     	@endforeach

	     	@if($arrayCount % 3 != 0)
	     		</div>
	     	@endif
	</div>
</div>
@stop