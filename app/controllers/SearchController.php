<?php

class SearchController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	public function search()
	{
		$keyword = Input::get('keyword');
		
		preg_match('/(?P<subject>[a-zA-Z]+)\s*(?P<number>\d+)/', $keyword, $matches);
		//echo $matches['subject'].'\n'.$matches['number'].'\n';
		//print_r($matches);
		//$books = DB::select( DB::raw("SELECT * FROM books WHERE course_id = 'MA 341'") );

		$books = DB::table('books')->where('subject', $matches['subject'])->where('course_id',$matches['number'])->get();
		// if(!$books){
		// 	$results = $books; 
		// }
		// else{
		// 	$count = 0;

		// 	foreach ($books as $book)
		// 	{
		// 		$book_copys = DB::table('book_copys')->where('book_id',$book->id)->get();
	 //    		foreach($book_copys as $book_copy)
	 //    		{
	 //    			$results[$count++] = $book_copy;
	 //    		}
		// 	}
		// }

		return View::make('book_results',array('results' => $books));
	}

}