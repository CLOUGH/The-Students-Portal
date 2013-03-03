<?php 
class Course_Controller extends Base_Controller
{

	public function get_course_detail($id)
	{
		parent::make_active("student_advisory");
		return View::make("course.course_detail")
			->with('title','Course Detials')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('course_detail',Course::get_course_detail($id))
			->with('pre_requisites',Course::get_pre_requisites($id))
			->with('schedules', Course::get_course_schedules($id))
			->with('registration_requirement',Course::get_registration_requirements($id));

	}
}
?>