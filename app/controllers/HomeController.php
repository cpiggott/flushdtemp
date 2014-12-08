<?php

class HomeController extends BaseController {

	

	public function home()
	{
		return View::make('home');
	}

	public function authHome(){
		return View::make('home');
	}

}
