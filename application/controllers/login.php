<?php
class Login_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index(){
		return View::make("login.index")
			->with('title','Login Page');
	}
	public function post_login(){

		$validation = Login::validate(Input::all());

			if($validation->fails())
			{	
				return Redirect::to_route('login')->with_errors($validation)->with_input();
				
			}else{
				$credentials = array('username' => Input::get('username'), 'password' =>Input::get('password'));
		
				if(Auth::attempt($credentials))
				{
					return Redirect::to_route('home');
				}
				else
				{
					return Redirect::to_route('login')
						->with('login_errors',true);
				}
			}
	}
	public function get_logout()
	{
		Auth::logout();
		return Redirect::to_route('login');
	}
}
?>