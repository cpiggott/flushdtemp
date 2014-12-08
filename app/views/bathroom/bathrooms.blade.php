@extends('layout')

@section('content')

<div class="jumbotron text-center">
   <div class="container">
   <?php $counter = 1;
   		 $initial = 0;
   		 $arrayCount = 0; ?>
   		@foreach($bathrooms as $bathroom)
   			<?php $arrayCount++; ?>
   			@if($counter % 3 == 0 || $initial == 0 )
   			<?php $initial = 1;?>
		  	<div class="row">
		  	@endif
				<div class="col-sm-6 col-md-4">
		    		<div class="thumbnail">
		      			<div class="caption">
							<h3>{{$bathroom->description}}</h3>
				    		<p>{{$bathroom->avg_rating}}</p>
				    		<p><a href="/bathroom/view/<?php echo $bathroom->id; ?>" class="btn btn-primary" role="button">View</a> <a href="/bathroom/rate/<?php echo $bathroom->id;?>" class="btn btn-default" role="button">Rate</a></p>
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
