<?php

class UserController extends BaseController {


	public function getCreate(){
		return View::make('account.create');
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(),
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'name' 				=> 'required|min:8',
				'password' 			=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-create')
			->withErrors($validator)
			->withInput();
		} else {
			
			$email = Input::get('email');
			$name = Input::get('name');
			$password = Input::get('password');


			$user = User::create( array(
				'user_name' 	=> $name,
				'email' 	=> $email,
				'password' => Hash::make($password)

			));

			if($user) {

				$auth = Auth::attempt( array(
					'email' 	=> $email,
					'password' 	=> $password
 					)
				);

				if($auth) {
					return Redirect::intended('/');
				}
				return Redirect::route('/');
			} else {
				return Redirect::route('/');
			}

		}
	}

	public function getSignOut(){
		Auth::logout();
		return Redirect::route('home');
	}

	public function getSignIn(){
		return View::make('account.signin');
	}

	public function postSignIn(){
		
			
		$email = Input::get('email');
		$password = Input::get('password');


		if(Auth::attempt( array('email' => $email, 'password' => $password))){
			return Redirect::intended('/');
		} else {
			return Redirect::to('account/login');
		}

		
	}

	public function viewAccount($code){
		$tempUser = User::find($code);
		return View::make('profile')->with('tempUser', $tempUser);
	}
	

	

}