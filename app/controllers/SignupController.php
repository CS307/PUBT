<?php

class SignupController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	public function search()
	{
		$keyword = Input::get('keyword');
		
		//$books = DB::select( DB::raw("SELECT * FROM books WHERE course_id = 'MA 341'") );

		$books = DB::table('books')->where('course_id', $keyword)->get();
		if(!$books){
			$results = $books; 
		}
		else{
			$count = 0;

			foreach ($books as $book)
			{
				$book_copys = DB::table('book_copys')->where('book_id',$book->id)->get();
	    		foreach($book_copys as $book_copy)
	    		{
	    			$results[$count++] = $book_copy;
	    		}
			}
		}

		return View::make('results',array('search_results' => $results));
	}

}