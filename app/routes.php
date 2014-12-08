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




//After a user has authorized
Route::group(array('before' => 'auth'), function(){

	Route::get('/map', array (
		'as' => 'map',
		'uses' => 'BathroomController@loadMap'
	));

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