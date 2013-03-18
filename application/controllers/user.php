<?php
class User_Controller extends Base_Controller {

	public $restful = true;    

	public function get_view_setting()
    {
    	

    	return View::make('user.view_setting')
    		->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('user',User::find(Auth::user()->id));
    }
    public function edit_setting()
    { 
    	echo "reached";
    	exit;
    	return View::make('user.edit_setting')
    		->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name);
    }

}