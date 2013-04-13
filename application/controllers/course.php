<?php 
class Course_Controller extends Base_Controller
{
	public $restful = true; 
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
	public function get_course_search(){
		
		parent::make_active("student_advisory");		
		return View::make("course.course_search")
			->with('title','Search Course')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('news_list', News::order_by('updated_at')->get())
			->with('faculties', Faculty::get_dropdown());
	}
	public function post_course_search()
	{	
		$course_code=base64_encode((Input::get('semester').'~'));
	
		$course_name = Course::encode_url(Input::get('course_name'));
		$course_code = Course::encode_url( Input::get('course_code'));
		$subject = Course::encode_url( Input::get('subject'));
		$level = Course::encode_url( Input::get('level'));
		$credit_range_min = Course::encode_url( Input::get('credit_range_min'));
		$credit_range_max = Course::encode_url(Input::get('credit_range_max'));
		$semester = Course::encode_url( Input::get('semester'));

		return Redirect::to(URL::base()."/course/course_list/$course_name/$course_code/$subject/$level/$credit_range_min/$credit_range_max/$semester");		
	}
	public function get_course_list($course_name,$course_code,$subject,$level,$credit_range_min,$credit_range_max,$semester)
	{
		parent::make_active("student_advisory");
		$data = array(
			'course_name'=>Course::decode_url($course_name),
			'course_code'=>Course::decode_url($course_code),
			'subject'=>Course::decode_url($subject),
			'level'=>Course::decode_url($level),
			'credit_range_min'=>Course::decode_url($credit_range_min),
			'credit_range_max'=>Course::decode_url($credit_range_max),
			'semester'=>Course::decode_url($semester),
			);

		$courses = Course::search_course($data,false);	
		return View::make("course.course_list")
			->with('title','Search Result')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('courses',$courses);
	}
}
?>