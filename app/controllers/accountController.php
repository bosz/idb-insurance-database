<?php
	
	class accountController extends BaseController{

		public function action_index(){
			return View::make('accounts/home');
		}


		public function action_login(){
			 $login_rules = [
				'username' => 'required',
				'password' => 'required',
			];

			$validator = Validator::make(Input::all(), $login_rules);
			if ($validator->passes()) {
				if(Auth::attempt(Input::only('username', 'password'), true)) {
					return Redirect::intended('/')
					->with('message', 'Logged in successfully');
				}
				return Redirect::back()
			   ->withInput()
			   ->with('error', ["Invalid email or password"]);
			}

			return Redirect::route('/')
			->with('error', $validator->messages()->all())
			->withInput();
		}

		public function action_logout(){
			Auth::logout();
			return View::make('welcomeView')->with('fromLogout', "fromLogout");
		}

		public function action_addUser(){
			$signup_rules = [
				'name'			=>		'required', 
				'email'			=>		'required|email',
				'username'		=>		'required|min:8',
				'password'		=>		'required|min:8',
				'role'			=>		'required'
			];

			var_dump(Input::all());

			$validator = Validator::make(Input::all(), $signup_rules);
			if ($validator->passes()){
				$user = new User();

				$user->name = Input::get('name');
				$user->email = Input::get('email');
				$user->username = Input::get('username');
				$user->role = Input::get('role');
				$user->password = Hash::make(Input::get('password'));

				$user->save();

				if(Auth::attempt(Input::only('username', 'password'), true)) {
					return Redirect::intended('/')
					->with('message', 'Logged in successfully');
				}




			}

			return Redirect::route('welcome')
			->with('error', $validator->messages()->all())
			->withInput();

		}


		public function action_editUserAccount(){

		}

		public function action_deleteUser(){

		}


		public function action_viewUserAccounts(){
			return View::make('accounts/view');
		}

	}

?>