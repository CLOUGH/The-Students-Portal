<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function action_index()
	{
		return $this->get_index();
	}
	public function get_index()
	{
		$acitve_navigation = array(
				'dashboard'=>'inactive',
				'website'=>'active',
				'home'=>'active',
				'view_student_profile'=>'inactive',
				'student_advisory'=>'inactive',
				'register'=>'inactive',
			);
		
		return View::make('home.index')
			->with('title','Home')
			->with('active_navigation',$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('news_list', News::order_by('updated_at')->get());

	}

}