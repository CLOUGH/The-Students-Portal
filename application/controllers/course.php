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
	public function get_academic_path()
	{

		parent::make_active("student_advisory");
		return View::make("course.course_academic_path")
			->with('title','Academic Path Generation')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('degree_names',Degree::get_degree_names());

	}
	
	public function post_generate_academic_path()
	{
		//Data variables
		$errors = array();
		$user = Auth::user();
		$degree_id = Input::get("degree_name");
		$student_id = NULL;
		if($user->type!=2)
			$student_id = Student::where_student_id(Input::get("student_id"))->first()->id;
		else
			$student_id = Student::where_user_id($user->id)->first()->id;

		$academic_path_data = AcademicPath::academic_path_data($degree_id,$student_id);


		//check if any errror exist and then get update the required $academic_path_raw_data from the user selected course
		if(empty($academic_path_data["errors"]))
		{
			//update $academic_path_data with the user selected academic path course
			foreach($academic_path_data['course_list'] as $course_list)
			{
				
				//check if a course has required courses after doing the checks with the students and the degree
				if(count($course_list["required_courses"])>0)
				{
					$academic_path_data["required_courses"] = array(Input::get("required_courses_for_".$course_list["course_id"]));					
				}
			}
		}
		else
			$errors =$academic_path_data["errors"];

		$academic_path_courses = AcademicPath::generate_path($academic_path_data,$student_id,$degree_id);


		$years = array();
		foreach($academic_path_courses as $course)
		{
			$years[$course->year] = $course->year;
		}
		asort($years);
		array_pop($years);

		parent::make_active('student_advisory');
		return View::make("course.course_academic_generation")
			->with('title','Academic Path Generation')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', $user->type)
			->with('user_first_name', $user->first_name)
			->with('errors',$errors)
			->with('years',$years)
			->with('academic_path_courses',$academic_path_courses );
	}
	public function get_course_info($course_id)
	{
		return Response::json(Course::find($course_id)->to_array());
	}
	public function get_course_prerequisites($degree_id,$student_id)
	{
		return Response::json(AcademicPath::academic_path_data($degree_id,$student_id));
	}	
}
?>