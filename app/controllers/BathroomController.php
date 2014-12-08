<?php

class BathroomController extends Controller {

	public function findBathroom(){


		$input1 = urlencode(Input::get('address'));
		$input2 = Input::get('city');
		$input2 = urlencode($input2 . ",");
		$input3 = urlencode(Input::get('state'));


		$authId = urlencode("0647eb4e-76de-43cf-bec3-918b1eba40d2");
		$authToken = urlencode("7cyazp0m4q1HpKuLm7yB");
		// Address input
		// $input1 = urlencode("234 Nichols Hall");
		// $input2 = urlencode("Manhattan,");
		// $input3 = urlencode("kansas");
		// Build the URL

		//uncomment after testing
		$req = "https://api.smartystreets.com/street-address/?street={$input1}&city={$input2}&state={$input3}&auth-id={$authId}&auth-token={$authToken}";
		//GET request and turn into associative array
		$result = json_decode(file_get_contents($req),true);
		

		$latitude = $result[0]['metadata']['latitude'];
		$longitude =  $result[0]['metadata']['longitude'];

		// $latitude = '39.18653';
		// $longitude = '-96.58080';

//Query database
		$bathrooms = DB::select(DB::raw("SELECT id, description, concurrency, avg_rating, handicap, lat, lng, ( 3959 * acos( cos( radians('$latitude') ) * cos (radians( lat ) ) * cos( radians(lng ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians ( lat ) ) ) ) AS distance FROM bathrooms HAVING distance < 10 ORDER BY distance") );


//Pass to view to create bathrooms

		//var_dump($bathrooms);
		return View::make('bathroom.bathrooms')->with('bathrooms', $bathrooms);


	}

	public function postFilterBathrooms(){

		$rating = Input::get('rating');
		$latitude = '39.18653';
		$longitude = '-96.58080';
		$distance = 3;

		$bathrooms = DB::select(DB::raw("SELECT x.id, x.description, x.concurrency, x.avg_rating, x.handicap, x.lat, x.lng, ( 3959 * acos( cos( radians('$latitude') ) * cos (radians( lat ) ) * cos( radians(lng ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians ( lat ) ) ) ) AS distance FROM bathrooms x
	WHERE x.avg_rating >= '$rating' HAVING distance < '$distance'" ) );

		

		return View::make('bathroom.bathrooms')->with('bathrooms', $bathrooms);

	}

	public function getFindBathroom(){
		$latitude = '39.18653';
		$longitude = '-96.58080';

		$bathrooms = DB::select(DB::raw("SELECT id, description, concurrency, avg_rating, handicap, lat, lng, ( 3959 * acos( cos( radians('$latitude') ) * cos (radians( lat ) ) * cos( radians(lng ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians ( lat ) ) ) ) AS distance FROM bathrooms HAVING distance < 10 ORDER BY distance") );


//Pass to view to create bathrooms

		//var_dump($bathrooms);
		return View::make('bathroom.bathrooms')->with('bathrooms', $bathrooms);
	}

	public function viewBathroom($code){

		 $bathroom = Bathroom::find($code);
		 return View::make('bathroom.bathroom')->with('bathroom', $bathroom);
	}

	public function getRateBathroom($code){

		return View::make('bathroom.ratebathroom')->with('code', $code);
	}

	public function postRateBathroom(){
		$rating = Input::get('rating');
		$code = Input::get('code');

		$rating = Rating::create(array(
			'flush_rating' => $rating,
			'bathroom_id' => $code
			)
		);

		$redirectStringt = 'bathroom/view/' . $code;
			return Redirect::intended($redirectStringt);
		
	}



	

	

}