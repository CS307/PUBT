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
		$user->confirmation = "Changjingtaidiaole";
		try{
		$user->save();
		}
		catch (\Exception $e){}
		return $user;
	}

}