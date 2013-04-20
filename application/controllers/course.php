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
		parent::make_active('student_advisory');
		return View::make("course.course_academic_generation")
			->with('title','Academic Path Generation')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name);
	}
	public function get_course_prerequisites($degree_name,$student_id)
	{
		$errors = array();
		$user = Auth::user();
		$student= new Student;
		if($user->type ==2)
		{
			$student = Student::with("completed_courses")->where_user_id($user->id);
		}
		else
		{
			$student = Student::with("completed_courses")->where_student_id($student_id)->first();
			if(is_null($student))
				$errors["student_not_found"] = true;
		}

		//Get degree courses 
		$degree = Degree::with("degree_courses")->where_name(urldecode($degree_name))->where_degree_type_id("1")->first();
		if(!is_null($degree)){
			foreach($degree->degree_courses as $degree_course)
			{
				$met_requirement = false;
				$prerequisites = $degree_course->course->pre_requisites;
				//if prerequisites exists for the course then do the following:
				//check if the student have the already met the requirement for the course
				if(!empty($prerequisites))
				{
					//For each prerequiste a course have get test if the student have already done that course
					foreach($prerequisites as $required_course)
					{
						//For each completed course test if the student have match the required course code
						foreach($student->completed_courses  as $completed_course)
						{
							//if the student have done that course already then stop the loop for testing anymore
							//student completed course and set requirement mathed for the course
							if($completed_course->course_id == $required_course->course_id)
							{
								$met_requirement = true; 
								break;
							}
						}
						//stop the loop for testing the other prerequistes if the student met the requirement of the 
						//course
						if($met_requirement == true) // 
							break;
					}
				}
				else
				{
					$met_requirement =true;
				}
				var_dump($degree_course->course->title);
				var_dump($degree_course->course->code);
				var_dump($degree_course->course_id);
				var_dump($met_requirement);
				echo("\n");
			}
		}
		else
			$errors["degree_not_found"]	= true;


		return Response::json(array(
			"errors"=>$errors));
	}	
}
?>