<?php 
class Search_Controller extends Base_Controller
{

	public function get_course_search(){
		
		parent::make_active("academic_advisor");		
		return View::make("search.course_search")
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
	
		$course_name = Search::encode_url(Input::get('course_name'));
		$course_code = Search::encode_url( Input::get('course_code'));
		$subject = Search::encode_url( Input::get('subject'));
		$level = Search::encode_url( Input::get('level'));
		$credit_range_min = Search::encode_url( Input::get('credit_range_min'));
		$credit_range_max = Search::encode_url(Input::get('credit_range_max'));
		$semester = Search::encode_url( Input::get('semester'));

		return Redirect::to(URL::base()."/search/course_list/$course_name/$course_code/$subject/$level/$credit_range_min/$credit_range_max/$semester");
		
		
	}
	public function get_course_list($course_name,$course_code,$subject,$level,$credit_range_min,$credit_range_max,$semester)
	{
		$data = array(
			'course_name'=>Search::decode_url($course_name),
			'course_code'=>Search::decode_url($course_code),
			'subject'=>Search::decode_url($subject),
			'level'=>Search::decode_url($level),
			'credit_range_min'=>Search::decode_url($credit_range_min),
			'credit_range_max'=>Search::decode_url($credit_range_max),
			'semester'=>Search::decode_url($semester),
			);

		$courses = Search::search_course($data,false);	
		parent::make_active("student_advisory");
		return View::make("search.course_list")
			->with('title','Search Result')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('courses',$courses);
	}
	
	
	
}
?>