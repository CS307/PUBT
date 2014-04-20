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
		$books = DB::table('books')->where('subject', $matches['subject'])->where('course_id',$matches['number'])->get();
		return View::make('book_results',array('results' => $books));
	}

}