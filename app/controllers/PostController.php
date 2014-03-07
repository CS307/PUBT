<?php

class PostController extends BaseController
{

public function postPost()
	{
		$ntitle = Input::get('title');
		$nauthor = Input::get('author');
		$nCN = Input::get('CN');
		$nprice = Input::get('price');
		$ncondition = Input::get('condition');
		$ndescription = Input::get('description');

		$rules = array(
			'CN'		=> 'Required'
			'price'		=> 'Required'

		);

		$inputs = Input::all();

		$validator = Validator::make($inputs, $rules);

		if ($validator->passes())
		{
			// Create the user.
			//
			$nbook = new BookCopy;
			$nbook->price = Input::get('price');
			$nbook->condition = Input::get('condition');
			$nbook->detail = Input::get('description');
			$book_id = DB::table('books')->where('course_id',Input::get('CN'))->first()->id;
			$nbook->book_id = $book_id;
			try {
				$nbook->save();
			} catch (Exception $e) {
				echo "Exception";
			}

			// Redirect to the register page.
			//
			echo "Post Success!";//Redirect::to('account/register')->with('success', 'Account created with success!');
			return Redirect::('/books');
		}

	}
}