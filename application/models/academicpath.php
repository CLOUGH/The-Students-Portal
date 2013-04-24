<?php 
class AcademicPath extends Eloquent{
	public static $table = "academic_paths";

	public function degree()
	{
		return $this->belongs_to("Degree");
	}

	public static function generate_path($academic_path_data,$student_id,$degree_id)
	{
		$student = Student::find($student_id);
		$academic_path = new AcademicPath;
		$academic_path->name = "Test";
		$academic_path->degree_id = $degree_id;
		$academic_path->student_id = $student_id;
		$academic_path->description = '';
		$academic_path->save();

		$academic_path_courses = array();
		//chcek if there are any errors before using the data
		if(count($academic_path_data["errors"])>0)
			return null;
		
		//foreach academic course list store the data appropriate with the year inwchich the student will take the course
		foreach($academic_path_data["course_list"] as $course)
		{
			$academic_path_course = new AcademicPathCourse;
			$academic_path_course->academic_path_id = $academic_path->id;
			$academic_path_course->course_id = $course["course_id"];
			$academic_path_course->academic_path_type_id = 1; #1=>core_course and 2=>free_electives
			$academic_path_course->is_requirement_met  = intval($course['is_requirement_met']);
			$academic_path_course->is_passed_course = intval($course['is_passed_course']);
			$academic_path_course->is_completed_course =intval($course['is_completed_course']);
			$academic_path_course->is_course_registered = intval($course['is_course_registered']);
			$academic_path_course->is_required_course_registered =intval( $course['is_required_course_registered']);
			$academic_path_course->is_override = intval(false); #TODO: implement this feature later
			$academic_path_course->is_required_course_degree_course = intval($course['is_required_course_degree_course']);
			$academic_path_course->academic_path_type_id = 1;
			$academic_path_course->year = 'error';

			$current_year = intval(date('Y'));
			$current_month =  intval(date('n'));
			$semester_course_offered = intval(Course::find($course['course_id'])->semester);
			
			//From the data gathered above determine if year the student should do this course
			if($academic_path_course->is_course_registered)
			{
				#if we are currently in the second semester the current year is this year
				if($current_month<=5)	
					$academic_path_course->year = $current_year;			
				#if we are in the 1st semester check which semester the course is offred and determine the year
				elseif($current_month<=12 && $current_month>5)
				{	
					if($semester_course_offered==1)
						$academic_path_course->year = $current_year;	
					else
						$academic_path_course->year = $current_year+1;	
				}
			}

			#Determine if the course was passed and if not do  a resit the following year or current year based on the current
			#month and the semester offered
			else if($academic_path_course->is_completed_course)
			{
				$completed_course = CompletedCourse::where_student_id($student_id)->where_course_id($academic_path_course->course_id)->first();
				
				if($academic_path_course->is_passed_course)
					$academic_path_course->year = DateTime::createFromFormat('Y-m-d',$completed_course->date_completed)->format('Y');
				else
					$academic_path_course->year = intval(DateTime::createFromFormat('Y-m-d',$completed_course->date_completed)->format('Y'))+1;
			}
			#if the required course is registered get the level of the required course and the semester and determine which year this course 
			#should be registered for
			else if ($academic_path_course->is_required_course_registered)
			{
				$registered_required_course = AcademicPath::get_registered_required_course($course['course_id'],$student_id);
				$academic_path_course->year = $current_year + Course::find($course['course_id'])->level - $registered_required_course->level;
			}
			#if the requirement was not met and and there ar courses that are not apart of the degree then add that course 
			#if the course requirement was met then test if the requirement that was met was by a degree course else get the courses that met that degree
			if($academic_path_course->is_requirement_met)
			{
				if($academic_path_course->is_required_course_degree_course)
				{
					$year = AcademicPath::get_course_year_from_degree($course['course_id'],$academic_path_data["course_list"],$student_id);
					if($current_month<=3)	
						$academic_path_course->year = $year+1;		
					#if we are in the 1st semester check which semester the course is offred and determine the year
					elseif($current_month<=12 && $current_month>3)
					{	
						if($semester_course_offered==1)
							$academic_path_course->year = $year+1;	
						else
							$academic_path_course->year = $year+2;	
					}
				}
			}
			$academic_path_course->save();
			array_push($academic_path_courses,$academic_path_course);
		}
		return $academic_path_courses;
	}
	private static function get_registered_required_course($course_id,$student_id)
	{	
		$course = Course::with("pre_requisites")->find($course_id);
		$student =Student::with("courses")->find($student_id);

		foreach($course->pre_requisites as $required_course)
		{
			foreach($student->courses as $registered_course)
			{
				if($registered_course->id == $required_course->course->id){

					return $registered_course;
				}

			}
		}
		return NULL;
	}
	private static function get_course_year_from_degree($course_id,$academic_path_course_list,$student_id)
	{
		static $function_count= 0;
		$function_count++;
		$course = Course::with("pre_requisites")->find($course_id);
		$require_course_key ='';
		foreach($course->pre_requisites as $required_course)
		{
			
			#find the course that is a requried course
			foreach($academic_path_course_list as $key=>$path_course)
			{
				#after finding the required course that was a prerequisite that was a matched course 
				#stop the loop and save the key to
				if($path_course['course_id'] == $required_course->required_course_id)
				{	
					$degree_course_pre_req = Course::find($path_course['course_id'])->prerequisites;
					$require_course_key = $key;
					break;
				}
			}
			if($require_course_key!='')
				break;
		}
		$current_year = intval(date('Y'));
		$current_month =  intval(date('n'));
		$semester_course_offered = intval(Course::find($academic_path_course_list[$require_course_key]['course_id'])->semester);
		
		
		//From the data gathered above determine if year the student should do this course
		if($academic_path_course_list[$require_course_key]['is_course_registered'])
		{
			#if we are currently in the second semester the current year is this year
			if($current_month<=3)	
				return $current_year;			
			#if we are in the 1st semester check which semester the course is offred and determine the year
			elseif($current_month<=12 && $current_month>3)
			{	
				if($semester_course_offered==1)
					return $current_year;	
				else
					return $current_year+1;	
			}
		}

		#Determine if the course was passed and if not do  a resit the following year or current year based on the current
		#month and the semester offered
		else if($academic_path_course_list[$require_course_key]['is_completed_course'])
		{
			$completed_course = CompletedCourse::where_student_id($student_id)->where_course_id($academic_path_course_list[$require_course_key]['course_id'])->first();
			if($academic_path_course_list[$require_course_key]['is_passed_course'])
				return  DateTime::createFromFormat('Y-m-d',$completed_course->date_completed)->format('Y');
			else
				return intval(DateTime::createFromFormat('Y-m-d',$completed_course->date_completed)->format('Y'))+1;
		}
		#if the required course is registered get the level of the required course and the semester and determine which year this course 
		#should be registered for
		else if ($academic_path_course_list[$require_course_key]['is_required_course_registered'])
		{
			$registered_required_course = AcademicPath::get_registered_required_course($academic_path_course_list['$require_course_key']['course_id'],$student_id);
			return $current_year + Course::find($academic_path_course_list['$require_course_key']['course_id'])->level - $registered_required_course->level;
		}
		#if the requirement was not met and and there ar courses that are not apart of the degree then add that course 
		#if the course requirement was met then test if the requirement that was met was by a degree course else get the courses that met that degree
		if($academic_path_course_list[$require_course_key]['is_requirement_met'])
		{
			if($academic_path_course_list[$require_course_key]['is_required_course_degree_course'])
			{
				return AcademicPath::get_course_year_from_degree($academic_path_course_list[$require_course_key]['course_id'],$academic_path_course_list,$student_id)+1;
			}
		}


	}
	public static function have_prerequisite($course_id,$student_id)
	{
		$course = Course::with("pre_requisites")->find($course_id);
		$student =Student::with("completed_course","courses")->find($student_id);

		$is_requirement_met = false;
		$is_required_course_registered = false;
		$is_completed_course = false;
		$is_passed_course = false;
		foreach($course->pre_requisites as $required_course)
		{
			foreach($student->completed_courses as $completed_course)
			{
				if($completed_course->course_id == $required_course->required_course_id)
				{
					$is_completed_course = true;
					//check if the course was passed
					if($completed_course->grade!='F')
					{
						$is_requirement_met = true; 
						$is_passed_course = true;
						break;
					}
				}
			}
			foreach($student->courses as $registered_course)
			{
				if($registered_course->id == $required_course->required_course_id)
				{
					$is_requirement_met = true; 
					$is_required_course_registered = true;
					break;
				}
			}
			if($is_requirement_met)
				break;
		}
		return array(
			'is_requirement_met'=>$is_requirement_met,
			'is_required_course_registered'=>$is_required_course_registered,
			'is_completed_course'=>$is_completed_course,
			'is_passed_course'=>$is_passed_course);
	}

	public static function academic_path_data($degree_id, $student_id)
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
			$student = Student::with("completed_courses")->find($student_id);
			if(is_null($student)){
				$errors["student_not_found"] = true;
				return Response::json(array(
									"course_list"=>$new_course_list,
									"errors"=>$errors));
			}
		}

		//Get degree courses 
		$degree = Degree::with("degree_courses")->find($degree_id);
		if(!is_null($degree)){
			foreach($degree->degree_courses as $degree_course)
			{
				$is_requirement_met = false;
				$is_passed_course = false;
				$is_completed_course = false;
				$is_course_registered = false;
				$is_required_course_registered = false;
				$is_override = false;
				$is_required_course_degree_course=false;
				$required_courses = array();
				$prerequisites = $degree_course->course->pre_requisites;

				//check if the course was registered by  the student (in the case got a override)
				foreach($student->courses as $course)
				{
					if($degree_course->course_id==$course->id)
					{
						$is_course_registered = true;
					}
				}


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
				//If the course is not a completed course then check if the required course is apart of
				//the degree and check if the student have done the required course and passed it
				if(!$is_completed_course && !$is_course_registered)
				{
					//if prerequisites exists for the course then do the following:
					//check if the student have the already met the requirement for the course
					if(!empty($prerequisites))
					{
						//For each prerequiste a course have get test if the student have already done that course
						foreach($prerequisites as $required_course)
						{
							//Test if the required course is apart of the selected degree
							foreach($degree->degree_courses as $selected_degree_course)
							{
								if($required_course->required_course_id == $selected_degree_course->course_id)
								{
									$is_required_course_degree_course = true;
									$is_requirement_met = true;
									break;
								}
							}
							//if the course pre-requisite is not a apart of any of the degree course 
							//then check if the student have met the requirements 
							if($is_required_course_degree_course == false)
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
							}
							//stop the loop for testing the other prerequistes if the student met the requirement of the 
							//course. Also clear any stored requried course since the requirement was met
							if($is_requirement_met == true)
							{
								$required_courses =array();
								break;
							}
							else//else continue the loop and store required coures
							{
								//check the student is currently registered for any of the required courses
								foreach($student->courses as $course)
								{
									if($required_course->required_course_id ==$course->id)
									{
										$is_required_course_registered =true;
										break;
									}

								}
								if($is_required_course_registered == false)
								{
									array_push($required_courses,$required_course->required_course_id);
								}
								else
								{
									$required_courses=array();
									break;
								}								
							}
						}
					}
					else
					{
						$is_requirement_met =true;
					}
				}
				//check if the course was registered and test if the requirement was met to see if it was a override
				//why the student was able to register for the course
				//if($is_course_registered && !$is_requirement_met)
				//{
				//	$override = true;
				//}

				//Add the course
				array_push($new_course_list,array(
					"course_id"=>$degree_course->course_id,
					"is_requirement_met"=>$is_requirement_met,
					"is_completed_course"=>$is_completed_course,
					"is_required_course_degree_course"=>$is_required_course_degree_course,
					"is_required_course_registered"=>$is_required_course_registered,
					"is_passed_course"=>$is_passed_course,
					"is_course_registered"=>$is_course_registered,
					"required_courses"=>$required_courses
					));
			}
		}
		else
			$errors["degree_not_found"]	= true;
		return array("course_list"=>$new_course_list,"errors"=>$errors);
	}	
	
}
?>