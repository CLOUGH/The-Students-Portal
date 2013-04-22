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
	public function get_course_info($course_id)
	{
		return Response::json(Course::find($course_id)->to_array());
	}
	public function get_course_prerequisites($degree_name,$student_id)
	{
		$errors = array();
		$user = Auth::user();
		$student= new Student;
		$new_course_list = array();

		if($user->type ==2)
		{
			$student = Student::with("completed_courses")->where_user_id($user->id)->first();
			
		}
		else
		{
			$student = Student::with("completed_courses")->where_student_id($student_id)->first();
			if(is_null($student)){
				$errors["student_not_found"] = true;
				return Response::json(array(
									"course_list"=>$new_course_list,
									"errors"=>$errors));
			}
		}

		//Get degree courses 
		$degree = Degree::with("degree_courses")->where_name(urldecode($degree_name))->where_degree_type_id("1")->first();
		if(!is_null($degree)){
			foreach($degree->degree_courses as $degree_course)
			{
				$is_requirement_met = false;
				$is_passed_course = false;
				$is_completed_course = false;
				$required_courses = array();
				$prerequisites = $degree_course->course->pre_requisites;

				//Check if the student had already done the course and passed it
				//i.e check if the course was done already and check if the student
				//passed the course
				foreach($student->completed_courses  as $completed_course)
				{
					//check if the student have already done the course
					if($completed_course->course_id == $degree_course->course_id)
					{
						//check if the course was passed
						if($completed_course->grade!='F')
						{
							$is_requirement_met=true;
							$is_passed_course=true;
						}

						$is_completed_course = true;
						break;
					}
				}

				if(!$is_completed_course)
				{
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
								if($completed_course->course_id == $required_course->required_course_id)
								{
									//check if the course was passed
									if($completed_course->grade!='F')
									{
										$is_requirement_met = true; 
									}
									break;
								}
							}
							//stop the loop for testing the other prerequistes if the student met the requirement of the 
							//course. Also clear any stored requried course since the requirement was met
							if($is_requirement_met == true)
							{
								$required_courses =array();
								break;
							}
							else//else continue the loop and store required coures
								array_push($required_courses,$required_course->required_course_id);
						}
					}
					else
					{
						$is_requirement_met =true;
					}
				}
				//Add the course
				array_push($new_course_list,array(
					"course_id"=>$degree_course->course_id,
					"is_requirement_met"=>$is_requirement_met,
					"is_completed_course"=>$is_completed_course,
					"is_passed_course"=>$is_passed_course,
					"required_courses"=>$required_courses
					));
			}
		}
		else
			$errors["degree_not_found"]	= true;


		return Response::json(array(
			"course_list"=>$new_course_list,
			"errors"=>$errors));
	}	
}
?>