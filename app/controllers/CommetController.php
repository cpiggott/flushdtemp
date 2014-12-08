<?php

class CommentController extends BaseController {

	public function getNewComment($code){
		return View::make('comment.newcomment')->with('code', $code);
	}

	public function postNewComment(){
		if(Auth::check()){

			$user = Auth::user();
			$commentText = Input::get('comment');
			$bathroomCode = Input::get('code');


			$comment = Comment::create( array(
				'wall_id' 	=> $bathroomCode,
				'likes' 	=> 0,
				'user_id' => $user->id,
				'message' => $commentText

			));
			$redirectStringt = 'bathroom/view/' . $bathroomCode;
			return Redirect::intended($redirectStringt);


		} else {
			//redirect to log in
			return Redirect::route('/');
		}
	}

	

}