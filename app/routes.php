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
	return View::make('post');
});






Route::get('search/{input}',function(){
	return View::make('results',array('number' => $input));

});

Route::get('users',function(){
	$users = User::all();
	return View::make('books',array('books' => $users));
});


Route::get('fake', function()
{
	//generateFake();
});

function create(){
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

function generateFake(){
	$i = 0;
	for($i=0;$i<20;$i++){
		$user = new User;
		$user->email = 'li'.$i.'@purdue.edu';
		$user->password = Hash::make('abcd');
		$user->confirmation = $i;
		try{
			$user->save();
		}
		catch (\Exception $e){}
	}
	return;
}
