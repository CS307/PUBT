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

Route::get('/', function(){
	return View::make('mainpage');
});

Route::get('resultPage', function(){
	return View::make('results',array('number' => 100));
});

Route::get('post_middle_page', function(){
	if(Auth::check()){
		return View::make('post_middle_page');
	}
	else{
		return Redirect::to('/');
	}
});

Route::post('post_select_page',function(){
	$keyword = Input::get('keyword');	
	preg_match('/(?P<subject>[a-zA-Z]+)\s*(?P<number>\d+)/', $keyword, $matches);
	$books = DB::table('books')->where('subject', $matches['subject'])->where('course_id',$matches['number'])->get();
	return View::make('post_select_page',array('results' => $books));
});

Route::get('/post/book_id={book_id}', function($book_id){
	$book = DB::table('books')->where('id',$book_id)->first();
	return View::make('post_page',array('book'=>$book));
});

Route::post('postBook',function(){
	$book_copy = new BookCopy;
	$book_copy->book_id = Input::get('book_id');
	$book_copy->price = Input::get('price');
	$book_copy->seller_id = Auth::user()->id;
	$book_copy->condition = Input::get('condition');
	$book_copy->detail = Input::get('detail');
	$book_copy->expire_date = "1994-01-30";
	$book_copy->save();
	return Redirect::to('/profilepage');
});

Route::post('postPost', array('uses' => 'PostController@postPost'));

Route::post('postRegister',array('uses' => 'AccountController@postRegister' ));

Route::post('postLogin',array('uses' => 'AccountController@postLogin'));

Route::post('postLogout',array('uses' => 'AccountController@getLogout'));

Route::post('search',array('uses' => 'SearchController@search'));

Route::get('search/subject={subject}',function($subject){
	$results = DB::table('books')->where('subject',$subject)->get();
	return View::make('book_results',array('results' => $results));
});

Route::get('/search/book_id={book_id}', function($book_id){
	$book_copys = DB::table('book_copys')->where('book_id',$book_id)->get();
	return View::make('book_copys_results', array('results' => $book_copys));
});

Route::get('/search/book_copy_id={bc_id}', function($bc_id){
	$book_copy = DB::table('book_copys')->where('id',$bc_id)->first();
	return View::make('sellingpage', array('book_copy' => $book_copy));
});

Route::get('verification/code={confirmation}', function($confirmation){
	DB::table('users')->where('confirmation', $confirmation)->update(array( 'confirmed' => true ));
    $user = DB::table('users')->where('confirmation', $confirmation)->first();
    Auth::attempt(array('email' => $user->email, 'password' => $user->password));
    return Redirect::to('/');
});

Route::get('profilepage',function(){
	if(Auth::check()){
		$user = Auth::user();
	 	$followingEntrys = DB::table('follow_list')->where('follower_id', $user->id)->get();
	 	if(!$followingEntrys){
		 	$results = $followingEntrys; 
		}
		else{
		 	$count = 0;
		 	foreach ($followingEntrys as $followingEntry)
		 	{
				$book_copy = DB::table('book_copys')->where('id',$followingEntry->copy_id)->first();
	    		$results[$count++] = $book_copy;
			}
		}
	 	$sellingbooks = DB::table('book_copys')->where('seller_id', $user->id)->get();
	 	return View::make('profilePage', array('user' => $user, 'followingbooks' => $results, 'sellingbooks'=> $sellingbooks));
	}
	else{
		return Redirect::to('/');
	}
});

Route::post('/follow/book_copy_id={bc_id}',function($bc_id){
	$follower_id = Input::get('follower_id');
	$fl = new FollowList;
	$fl->follower_id = $follower_id;
	$fl->copy_id = $bc_id;
	$fl->save();
	return Redirect::to('/search/book_copy_id='.$bc_id);
});

Route::post('/unfollow/book_copy_id={bc_id}',function($bc_id){
	$follower_id = Input::get('follower_id');
	DB::table('follow_list')->where('follower_id', $follower_id)->where('copy_id', $bc_id)->delete();
	return Redirect::to('/search/book_copy_id='.$bc_id);
});

Route::post('/soldout', function(){
	$bc_id = Input::get('book_copy_id');
	DB::table('book_copys')->where('id', $bc_id)->update(array('soldout' => true));
	return Redirect::to('/search/book_copy_id='.$bc_id);
});

Route::post('/recover', function(){
	$bc_id = Input::get('book_copy_id');
	DB::table('book_copys')->where('id', $bc_id)->update(array('soldout' => false));
	return Redirect::to('/search/book_copy_id='.$bc_id);
});

Route::post('/join_buyerlist',function(){
	$bc_id = Input::get('book_copy_id');
	$buyer_id = Input::get('buyer_id');
	$book_copy = DB::table('book_copys')->where('id', $bc_id)->first();
	$seller_id = $book_copy->seller_id;
	$book = DB::table('books')->where('id', $book_copy->book_id)->first();
	$seller = DB::table('users')->where('id', $seller_id)->first();
	$buyer = DB::table('users')->where('id', $buyer_id)->first();

	// Send email to seller
	Mail::send('email_buying', array('username'=>$seller->email, 'buyer'=>$buyer, 'book_copy'=>$book_copy, 'comment'=>Input::get('comment'), 'offer_price'=>Input::get('amount')), function($message){
         $message->to($seller->email.'@purdue.edu', NULL)->subject('Someone wants to buy your selling book!');
    });

	return Redirect::to('/search/book_copy_id='.$bc_id);
});










//Use for testing
Route::get('users',function(){
	$users = User::all();
	return View::make('users',array('users' => $users));
});

//Use for testing
Route::get('books',function(){
	$books = Book::all();
	return View::make('books',array('books' => $books));
});

//Use for testing
Route::get('book_copys',function(){
	$book_copys = BookCopy::all();
	return View::make('book_copys',array('book_copys' => $book_copys));
});

//Use for testing
Route::get('profile',function(){
	//$book_copys = BookCopy::all();
	return View::make('profilePage');
});






























Route::get('fake', function()
{
	DB::table('book_copys')->where('id', 2)->update(array('price' => 45.67));
});

function createUser(){
	$user = new User;
	$user->email = 'yu282@purdue.edu';
	$user->password = Hash::make('abcd');
	$user->cell = '7654910417';
	try{
	$user->save();
	}
	catch (\Exception $e){}
	return $user;
}

function generateFakeBookCopys(){

	$book_copy9 = new BookCopy;	
	$book_copy9->book_id = 3;
	$book_copy9->price = 99999.99;
	$book_copy9->seller_id = 33;
	$book_copy9->condition = "Fair condition";
	$book_copy9->detail = "Trade in for a GTR";
	$book_copy9->expire_date = "2014-03-15";
	$book_copy9->save();
	
	$book_copy10 = new BookCopy;
	$book_copy10->book_id = 1;
	$book_copy10->price = 25.00;
	$book_copy10->seller_id = 18;
	$book_copy10->condition = "Fair condition";
	$book_copy10->detail = "Used it for a semester, some notes on it but clean.";
	$book_copy10->expire_date = "2014-03-15";
	$book_copy10->save();

	$book_copy11 = new BookCopy;
	$book_copy11->book_id = 2;
	$book_copy11->price = 28.98;
	$book_copy11->seller_id = 20;
	$book_copy11->condition = "Good condition";
	$book_copy11->detail = "Book is in good shape.";
	$book_copy11->expire_date = "2014-03-15";
	$book_copy11->save();
	
	$book_copy12 = new BookCopy;
	$book_copy12->book_id = 3;
	$book_copy12->price = 38.98;
	$book_copy12->seller_id = 12;
	$book_copy12->condition = "Good condition";
	$book_copy12->detail = " They are in great condition (one has a little messed up cover-nothing major).";
	$book_copy12->expire_date = "2014-03-15";
	$book_copy12->save();
	
	$book_copy13 = new BookCopy;
	$book_copy13->book_id = 4;
	$book_copy13->price = 36.20;
	$book_copy13->seller_id = 13;
	$book_copy13->condition = "Good condition";
	$book_copy13->detail = " For sale, in good condition.";
	$book_copy13->expire_date = "2014-03-15";
	$book_copy13->save();
	
	$book_copy14 = new BookCopy;
	$book_copy14->book_id = 1;
	$book_copy14->price = 68.20;
	$book_copy14->seller_id = 14;
	$book_copy14->condition = "Good condition";
	$book_copy14->detail = "Paperback. Excellent condition.";
	$book_copy14->expire_date = "2014-03-15";
	$book_copy14->save();
	
	$book_copy15 = new BookCopy;
	$book_copy15->book_id = 2;
	$book_copy15->price = 78.8;
	$book_copy15->seller_id = 15;
	$book_copy15->condition = "new with tags";
	$book_copy15->detail = "I am selling Brand New & Unopened Textbook. You won't find a better deal anywhere like this!";
	$book_copy15->expire_date = "2014-03-15";
	$book_copy15->save();
	
	$book_copy16 = new BookCopy;
	$book_copy16->book_id = 3;
	$book_copy16->price = 35.5;
	$book_copy16->seller_id = 16;
	$book_copy16->condition = "Good condition";
	$book_copy16->detail = "Book is in very good condition. Very minor wear on the edges. Pages are in good shape as well. ";
	$book_copy16->expire_date = "2014-03-15";
	$book_copy16->save();
	
	$book_copy17 = new BookCopy;
	$book_copy17->book_id = 4;
	$book_copy17->price = 68.5;
	$book_copy17->seller_id = 17;
	$book_copy17->condition = "Good condition";
	$book_copy17->detail = "Clean no tears rips writing etc";
	$book_copy17->expire_date = "2014-03-15";
	$book_copy17->save();
	
	$book_copy18 = new BookCopy;
	$book_copy18->book_id = 1;
	$book_copy18->price = 78.65;
	$book_copy18->seller_id = 18;
	$book_copy18->condition = "Good condition";
	$book_copy18->detail = "It was purchased new by me and well cared for. It's hard cover";
	$book_copy18->expire_date = "2014-03-15";
	$book_copy18->save();
	
	$book_copy19 = new BookCopy;
	$book_copy19->book_id = 2;
	$book_copy19->price = 199.98;
	$book_copy19->seller_id = 19;
	$book_copy19->condition = "Good condition";
	$book_copy19->detail = "Deluxe Edition!! It is in like new condition except for the presented to page has writing. This page could be removed by the buyer without damaging the rest of the Book.";
	$book_copy19->expire_date = "2014-03-15";
	$book_copy19->save();
	
	$book_copy20 = new BookCopy;
	$book_copy20->book_id = 3;
	$book_copy20->price = 67;
	$book_copy20->seller_id = 20;
	$book_copy20->condition = "Good condition";
	$book_copy20->detail = "The pages are in great shape with no tears, folds, or wrinkles, with just some slight yellowing around the edges. The outside cover is in very good condition with some wear around the edges and the top and back end cover. ";
	$book_copy20->expire_date = "2014-03-15";
	$book_copy20->save();
	
	$book_copy21 = new BookCopy;
	$book_copy21->book_id = 4;
	$book_copy21->price = 67;
	$book_copy21->seller_id = 21;
	$book_copy21->condition = "Fair condition";
	$book_copy21->detail = "Covers not in best condition but all the pages are there, all the pages are intact.";
	$book_copy21->expire_date = "2014-03-15";
	$book_copy21->save();



	return;
}

