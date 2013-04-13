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
    public function get_edit_setting()
    { 
    	return View::make('user.edit_setting')
    		->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
            ->with('user',User::find(Auth::user()->id));
    }
    public function post_save_user_setting(){
        $validation = User::validate(Input::all());

        if($validation->fails())
        {   
            return Redirect::to_route('edit_setting')->with_errors($validation)->with_input();
            
        }else{
            // $user = User::find(Auth::user()->id);
            // $user->update(array(
            //     "first_name"=>Input::get('first_name'),
            //     "last_name"=>Input::get('last_name'),
            //     "new_password"=>Input::get('new_password')));
        }
        return Redirect::to_route("view_setting");
    }

}