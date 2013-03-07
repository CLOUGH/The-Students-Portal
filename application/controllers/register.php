<?php

class Register_Controller extends Base_Controller {

	public $restful = true;    

	public function post_register_course()
    {
    	$current_student = User::with("student")->find(Auth::user()->id);
    	$error_msg = Register::register_course(Input::get('schedule'),$current_student->student->id);
    	if($error_msg!=""){
    		Session::put('registration_errors', $error_msg);
    		return Redirect::back()->with_input();
    	}
    	else
    		return Redirect::home();
    }    

	public function get_view_courses()
    {

    }

}
?>