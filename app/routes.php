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

Route::get('/', function()
{
	return View::make('mainpage');
});

Route::get('resultPage', function(){
	return View::make('results',array('number' => 100));
});

Route::get('postPage', function(){
	return View::make('post_page');
});


Route::post('postRegister',array('uses' => 'AccountController@postRegister' ));

Route::post('postLogin',array('uses' => 'AccountController@postLogin'));

Route::post('search',array('uses' => 'SignupController@search'));




Route::get('search=ma',function(){
	return View::make('results',array('number' => 34));

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


Route::get('fake', function()
{
	//generateFakeBookCopys();
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

function generateFakeBook(){
	$book1 = new Book;
	$book1->title = "Introduction to Real Analtsis";
	$book1->author = "Robert G. Bartle";
	$book1->course_id = "MA 341";
	$book1->save();
	//$book2 = new Book;
	$book1->title = "Linear Algebra";
	$book1->author = "Richard J. Penney";
	$book1->course_id = "MA 351";
	$book1->save();
	//$book3 = new Book;
	$book1->title = "Algorithms";
	$book1->author = "Robert Sedgewick";
	$book1->course_id = "CS 251";
	$book1->save();
	return;
}

function generateFakeBookCopys(){
	$book_copy = new BookCopy;
	$book_copy->book_id = 1;
	$book_copy->price = 998.00;
	$book_copy->seller_id = 1;
	$book_copy->condition = "new with tags";
	$book_copy->detail = "Brand new!!";
	$book_copy->expire_date = "2014-03-15";
	$book_copy->save();

	$book_copy1 = new BookCopy;
	$book_copy1->book_id = 2;
	$book_copy1->price = 30.00;
	$book_copy1->seller_id = 18;
	$book_copy1->condition = "Like new";
	$book_copy1->detail = "";
	$book_copy1->expire_date = "2014-03-15";
	$book_copy1->save();
	
	$book_copy2 = new BookCopy;
	$book_copy2->book_id = 3;
	$book_copy2->price = 57.00;
	$book_copy2->seller_id = 19;
	$book_copy2->condition = "Like new";
	$book_copy2->detail = "";
	$book_copy2->expire_date = 2014-03-15;
	$book_copy2->save();

	$book_copy3 = new BookCopy;
	$book_copy3->book_id = 4;
	$book_copy3->price = 27.99;
	$book_copy3->seller_id = 12;
	$book_copy3->condition = "Good condition";
	$book_copy3->detail = "";
	$book_copy3->expire_date = 2014-03-15;
	$book_copy3->save();

	$book_copy4 = new BookCopy;
	$book_copy4->book_id = 1;
	$book_copy4->price = 50.98;
	$book_copy4->seller_id = 11;
	$book_copy4->condition = "New with tags";
	$book_copy4->detail = "Never use it!";
	$book_copy4->expire_date = 2014-03-15;
	$book_copy4->save();

	$book_copy5 = new BookCopy;
	$book_copy5->book_id = 2;
	$book_copy5->price = 17.40;
	$book_copy5->seller_id = 14;
	$book_copy5->condition = "Fair condition";
	$book_copy5->detail = "A book with note";
	$book_copy5->expire_date = 2014-03-15;
	$book_copy5->save();

 	$book_copy6 = new BookCopy;
	$book_copy6->book_id = 4;
	$book_copy6->price = 45.00;
	$book_copy6->seller_id = 25;
	$book_copy6->condition = "Like new";
	$book_copy6->detail = "";
	$book_copy6->expire_date = 2014-03-15;
	$book_copy6->save();

	$book_copy7 = new BookCopy;	
	$book_copy7->book_id = 1;
	$book_copy7->price = 34.00;
	$book_copy7->seller_id = 28;
	$book_copy7->condition = "Good condition";
	$book_copy7->detail = "Looks new";
	$book_copy7->expire_date = 2014-03-15;
	$book_copy7->save();

	$book_copy8 = new BookCopy;
	$book_copy8->book_id = 2;
	$book_copy8->price = 89.00;
	$book_copy8->seller_id = 16;
	$book_copy8->condition = "New with tags";
	$book_copy8->detail = "Bought it yesterday, I just drop that course";
	$book_copy8->expire_date = 2014-03-15;
	$book_copy8->save();

	$book_copy9 = new BookCopy;	
	$book_copy9->book_id = 3;
	$book_copy9->price = 99999.99;
	$book_copy9->seller_id = 33;
	$book_copy9->condition = "Fair condition";
	$book_copy9->detail = "Comes from my dad!Trade in for a GTR";
	$book_copy9->expire_date = "2014-03-15";
	$book_copy9->save();




	return;
}

