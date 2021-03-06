<?php

class AccountController extends AuthorizedController
{
	/**
	 * Let's whitelist all the methods we want to allow guests to visit!
	 *
	 * @access   protected
	 * @var      array
	 */
	protected $whitelist = array(
		'getLogin',
		'postLogin',
		'getRegister',
		'postRegister'
	);

	/**
	 * Main users page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getIndex()
	{
		// Show the page.
		//
		return View::make('account/index')->with('user', Auth::user());
	}

	/**
	 *
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postIndex()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'first_name' => 'Required',
			'last_name'  => 'Required',
			'email'      => 'Required|Email|Unique:users,email,' . Auth::user()->email . ',email',
		);

		// If we are updating the password.
		//
		if (Input::get('password'))
		{
			// Update the validation rules.
			//
			$rules['password']              = 'Required|Confirmed';
			$rules['password_confirmation'] = 'Required';
		}

		// Get all the inputs.
		//
		$inputs = Input::all();

		// Validate the inputs.
		//
		$validator = Validator::make($inputs, $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Create the user.
			//
			$user =  User::find(Auth::user()->id);
			$user->first_name = Input::get('first_name');
			$user->last_name  = Input::get('last_name');
			$user->email      = Input::get('email');

			if (Input::get('password') !== '')
			{
				$user->password = Hash::make(Input::get('password'));
			}

			$user->save();

			// Redirect to the register page.
			//
			return Redirect::to('account')->with('success', 'Account updated with success!');
		}

		// Something went wrong.
		//
		return Redirect::to('account')->withInput($inputs)->withErrors($validator->getMessageBag());
	}

	/**
	 * Login form page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getLogin()
	{
		// Are we logged in?
		//
		if (Auth::check())
		{
			return Redirect::to('account');
		}

		// Show the page.
		//
		return View::make('account/login');
	}

	/**
	 * Login form processing.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postLogin()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'email'    => 'Required',
			'password' => 'Required'
		);

		// Get all the inputs.
		//
		$email = Input::get('email');
		$password = Input::get('password');

		// Validate the inputs.
		//
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Try to log the user in.
			//
			if (Auth::attempt(array('email' => $email, 'password' => $password)))
			{
				if(!Auth::user()->confirmed){
					Auth::logout();
					echo "Please verify your account!";
				}

				// Redirect to the users page.
				//
				return Redirect::to('/profilepage');//Redirect::to('account')->with('success', 'You have logged in successfully');
			}
			else
			{
				// Redirect to the login page.
				//
				echo "Failed";//return Redirect::to('account/login')->with('error', 'Email/password invalid.');
				return Redirect::to('/');
			}
			return;
		}

		// Something went wrong.
		//
		echo "woops";//return Redirect::to('account/login')->withErrors($validator->getMessages());
	}

	/**
	 * User account creation form page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getRegister()
	{
		// Are we logged in?
		//
		if (Auth::check())
		{
			return Redirect::to('account');
		}

		// Show the page.
		//
		return View::make('account/register');
	}

	/**
	 * User account creation form processing.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postRegister()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'email'                 => 'Required|Unique:users',
			'password'              => 'Required|Confirmed',
			'password_confirmation' => 'Required'
		);

		// Get all the inputs.
		//
		$inputs = Input::all();

		// Validate the inputs.
		//
		$validator = Validator::make($inputs, $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Create the user.
			//
			$user = new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$confirmation = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30);
			$user->confirmation = $confirmation;
			try {
				$user->save();
			} catch (Exception $e) {
				echo "Exception";
			}

			// Send verification email
			Mail::send('email_verification', array('username'=>Input::get('email'), 'confirmation'=>$confirmation), function($message){
         		$message->to(Input::get('email').'@purdue.edu', NULL)->subject('Verification Email for boilertrade.us');
     		});

     		return Redirect::to('/');

			// // Try to log the user in.
			// if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
			// {
			// 	// Redirect to the users page.
			// 	//
			// 	return Redirect::to('/');//Redirect::to('account')->with('success', 'You have logged in successfully');
			// }
			// else
			// {
			// 	// Redirect to the login page.
			// 	echo "Login Failed";//return Redirect::to('account/login')->with('error', 'Email/password invalid.');
			// }
		}

		// Something went wrong.
		//
		echo "Register Failed";//Redirect::to('account/register')->withInput($inputs)->withErrors($validator->getMessages());
	}

	/**
	 * Logout page.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function getLogout()
	{
		// Log the user out.
		//
		Auth::logout();

		// Redirect to the users page.
		//
		return Redirect::to('/');
		//return Redirect::to('account/login')->with('success', 'Logged out with success!');
	}
}