<?php

class Student_Controller extends Base_Controller {

	public $restful = true;    

	public function get_student_detail($id)
    {
    	parent::make_active("academic_advisor");
    	return View::make("student.student_detail")
    		->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('faculties', Faculty::get_dropdown())
    		->with('student', Student::with('user','student.faculty','student.studenttype','student.courses','student.schedules')->find($id));
    }
    public static function search_student($args)
	{
		if(count($args)==0)
			return Student::with('user','student.faculty','student.studenttype')->where('user_id','=','2')->get();
		else{

			$user = array('user'=>function($query) use ($args){
				$query->where('first_name','LIKE',"%$args[first_name]%");
			});
			$students = DB::table('students')->join('faculties','students.faculty_id','=','faculties.id')
					->join('users','students.user_id','=','users.id')
					->join('student_types','students.student_type_id','=','student_types.id')
					->where('student_id','LIKE',"%$args[student_id]%")
					->where('users.first_name','LIKE',"%$args[first_name]%")
					->where('users.last_name','LIKE',"%$args[last_name]%");
			if($args['faculty']!='all')
				$students->where('faculties.id','=',"$args[faculty]");
			if($args['student_type']!='all')
				$students->where('student_types.id','=',"$args[student_type]");							
			
			return $students->get(array('students.id','students.student_id','users.first_name','users.last_name',
					'faculties.name as faculty','student_types.name as student_type','users.email') );
		}	
	}
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
    	parent::make_activse("register");
    	return View::make('student.view_registered_courses')
    				->with('title','Search for Students')
					->with('active_navigation',parent::$acitve_navigation)
					->with('user_type', Auth::user()->type)
					->with('user_first_name', Auth::user()->first_name)
					->with('student',Student::with($user,'student.faculty','student.studenttype','student.courses','student.schedules')->first());
    }
    public function get_student_profile()
    {
    	$user_id = Auth::user()->id;
    	$user = array('user'=>function($query)use ($user_id){
    		$query->where('id','=',$user_id);
    	});
    	parent::make_active("view_student_profile");
    	return View::make('student.student_detail')
    				->with('title','Search for Students')
					->with('active_navigation',parent::$acitve_navigation)
					->with('user_type', Auth::user()->type)
					->with('user_first_name', Auth::user()->first_name)
					->with('student', Student::with('user','student.faculty','student.studenttype','student.courses','student.schedules','student.level_type')
						->where('user_id','=',$user_id)->first());

    }

}
?>