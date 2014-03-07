<?php

class PostController extends BaseController
{

public function postPost()
	{
		$rules = array(
			'CN'		=> 'Required',
			'price'		=> 'Required'

		);

		$inputs = Input::all();

		foreach ($inputs as $input){
			echo $input;
		}

		$validator = Validator::make($inputs, $rules);

		if ($validator->passes())
		{
			// Create the user.
			//
			$nbook = new BookCopy;
			$nbook->price = Input::get('price');
			$nbook->condition = Input::get('condition');
			$nbook->detail = Input::get('description');
			$nbook->seller_id = Auth::user()->id;
			$book_id = DB::table('books')->where('course_id',Input::get('CN'))->first()->id;
			$nbook->book_id = $book_id;
			//try {
			$nbook->save();
			//} catch (Exception $e) {
			//	echo "Exception";
			//}

			// Redirect to the register page.
			//
			//Redirect::to('account/register')->with('success', 'Account created with success!');
			return Redirect::to('/books');
		}


	}
}