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
    		return Redirect::to_route('view_registered_courses');
    }    

	public function get_view_courses()
    {
    	$user_id = Auth::user()->id;
    	$user = array('user'=>function($query)use ($user_id){
    		$query->where('id','=',$user_id);
    	});
    	parent::make_active("register");
    	return View::make('register.view_courses')
    				->with('title','Search for Students')
					->with('active_navigation',parent::$acitve_navigation)
					->with('user_type', Auth::user()->type)
					->with('user_first_name', Auth::user()->first_name)
					->with('student',Student::with($user,'student.faculty','student.studenttype','student.courses','student.schedules')->first());
    }

}
?>