<?php
class Academic_Advisor_Controller extends Base_Controller{
	public $restful = true;

	public function get_search_student(){
		return View::make("academic_advisor.search_student")
			->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('faculties', Faculty::get_dropdown());
	}
	public function post_search_student()
	{
		return View::make('academic_advisor.student_list')
			->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('faculties', Faculty::get_dropdown());
	}
	public function get_student_list()
	{
		return View::make('academic_advisor.student_list')
			->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('faculties', Faculty::get_dropdown());
	}


}
?>