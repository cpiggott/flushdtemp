<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array (
	'as' => 'home',
	'uses' => 'HomeController@home'
));

//Could potentially go in the user auth group

Route::post('bathroom/find', array (
		'as' => 'find-bathroom',
		'uses' => 'BathroomController@findBathroom'
));

Route::get('bathroom/view/{code}', array(
	'as' => 'view-bathroom',
	'uses' => 'BathroomController@viewBathroom')
);

Route::get('bathroom/rate/{code}', array(
	'as' => 'view-bathroom',
	'uses' => 'BathroomController@getRateBathroom')
);


Route::post('bathroom/rate/newrate', array(
	'as' => 'rate-bathroom',
	'uses' => 'BathroomController@postRateBathroom'
	)
);



//After a user has authorized
Route::group(array('before' => 'auth'), function(){

	Route::get('bathroom/view/newcomment/{code}', array(
	'as' => 'new-comment',
	'uses' => 'CommentController@getNewComment'
	)
);

Route::post('bathroom/view/newcomment', array(
	'as' => 'new-comment-post',
	'uses' => 'CommentController@postNewComment'
	)
);


	


});



Route::get('account/signout', array(
		'as' => 'account-sign-out',
		'uses' => 'UserController@getSignOut'
	)
);

Route::get('users', 'UserController@showUser');


/* Un-authenticated group*/

Route::group(array('before'=> 'guest'), function(){

	Route::group(array('before' => 'csrf'), function(){

		Route::post('account/create', array(
			'as' => 'account-create-post',
			'uses' => 'UserController@postCreate'
			)
		);

	});

	Route::get('account/create', array(
		'as' => 'account-create',
		'uses' => 'UserController@getCreate'
		)
	);


	Route::get('account/signin', array(
		'as' => 'account-sing-in',
		'uses' => 'UserController@getSignIn'
		)
	);

	Route::post('account/signin', array(
		'as' => 'account-sing-in',
		'uses' => 'UserController@postSignIn'
		)
	);


});