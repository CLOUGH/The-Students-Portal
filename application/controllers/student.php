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

}
?>