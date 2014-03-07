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

Route::get('books', function(){
	//create();
	//$users = User::all();
	return View::make('results',array('number' => 100));
});

Route::get('search/{input}',function(){
	return View::make('results',array('number' => $input));

});



Route::get('fake', function()
{
	generateFake();
});

function create(){
	$user = new User;
	$user->email = 'chen769@purdue.edu';
	$user->password = Hash::make('abcd');
	$user->cell = '7654910417';
	$user->save();
	return $user;
}

function fakedata(){
	$i = 0;
	for(i=0;i<20;i++){
		$user = new User;
		$user->email = 'abcd'.$i.'@purdue.edu';
		$user->password = Hash::make('abcd');
		$user->save();
	}
	return;
}
