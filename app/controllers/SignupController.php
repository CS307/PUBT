<?php

class SignupController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function sign_up()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$cpassword = Input::get('confirmpw');

		//TODO: Check pw are same 

		$user = new User;
		$user->email = $username . "@purdue.edu";
		$user->password = Hash::make($password);
		$user->cell = '7654910902';
		$user->confirmation = "Changjingtai";
		try{
		$user->save();
		echo "Sucess!";
		}
		catch (\Exception $e){}
		return $user;
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		
		//$books = DB::select( DB::raw("SELECT * FROM books WHERE course_id = 'MA 341'") );

		$books = DB::table('books')->where('course_id', $keyword)->get();
		$count = 0;

		foreach ($books as $book)
		{
			$book_copys = DB::table('book_copys')->where('book_id',$book->id)->get();
	    	foreach($book_copys as $book_copy)
	    	{
	    		$results[$count++] = $book_copy;
	    	}
	 
		}

		return View::make('results',array('search_results' => $results));

	}

}