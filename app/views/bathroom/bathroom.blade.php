@extends('layout')

@section('content')

<div class="jumbotron text-center">
   <div class="container">
	  	<div class="row">
			<div class="col-sm-12 col-md-12">
	    		<div class="thumbnail">
	      			<div class="caption">
						<h3>{{$bathroom->description}}</h3>
			    		<p>Rating: {{$bathroom->avg_rating}}</p>
			    		<!-- <p><a href="/bathroom/view/<?php echo $bathroom->id; ?>" class="btn btn-primary" role="button">View</a> <a href="/bathroom/rate/<?php echo $bathroom->id;?>" class="btn btn-default" role="button">Rate</a></p> -->
	        		</div>
	    		</div>
	  		</div>
 		</div>
 		<div class="row">
 			<div class="col-sm-12 col-md-12">
 				
 				<div class="jumbotron">
 				<h3>The Wall</h3>
 					<?php 
 						$comments = DB::select(DB::raw("SELECT x.id, x.message, x.likes, x.user_id FROM comments x, walls y, bathrooms z WHERE z.id = '$bathroom->id' AND z.id = y.bathroom_id AND y.id = x.wall_id LIMIT 25") );
 					?>

 					@if(empty($comments))
 						<p>No one has written on the wall, be the first? Go on, you know you want to ;) </p>
 						<p><a href="/bathroom/view/newcomment/<?php echo $bathroom->id; ?>" class="btn btn-primary" role="button">Write On The Wall</a>
 					@else
 					<p><a href="/bathroom/view/newcomment/<?php echo $bathroom->id; ?>" class="btn btn-primary" role="button">Write On The Wall</a>
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
 					@endif
 				</div>
 			</div>
 		</div>
    </div> 
 </div>


@stop