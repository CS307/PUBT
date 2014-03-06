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
	return 'Test deploy!';
});

Route::get('books', function(){
	//create();
	$users = User::all();
	return View::make('books')->with('books',$users);
});

function create(){
	$user = new User;
	$user->email = 'chen769@purdue.edu';
	$user->password = Hash::make('abcd');
	$user->cell = '7654910417';
	$user->save();
	return $user;
}
