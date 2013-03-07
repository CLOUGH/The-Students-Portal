<?php

class Register
{

	 public static function register_course($schedules_crn,$student_id)
	 {
	 	$error_msg ='';

	 	if(count($schedules_crn)<=0){
	 		$error = "<li>Please select a schedule before registering.</li>";
	 		return $error_msg;
	 	}

	 	//Get registration requirements
	 	$reg_req = Register::get_registration_requirement($schedules_crn[0]);
	 	//check if the schedules selected match the registration requirements
	 	$lectures = 0;
	 	$tutorials = 0;
	 	$labs = 0;
	 	$seminar = 0;

	 	foreach($schedules_crn as $crn)
	 	{
	 		//get the schedule
	 		
	 		$schedule= Schedule::where('crn', '=', $crn)->first();
	 		
	 		switch(strtolower($schedule->type->name))
	 		{
	 			case 'lecture':
	 				$lectures++;
	 				break;
	 			case 'tutorial':
	 				$tutorials++;
	 				break;
	 			case 'lab':
	 				$labs++;
	 				break;
	 			case 'seminar':
	 				$seminar++;
	 				break;
	 		}
	 	}	 	
	 	if(intval($reg_req->lectures)!=$lectures)
	 		$error_msg .="<li>You did not select the required amount of lectures to register.</li>";
	 	if(intval($reg_req->tutorials)!=$tutorials)
	 		$error_msg .="<li>You did not select the required amount of tutorials to register</li>";
	 	if(intval($reg_req->labs)!=$labs)
	 		$error_msg .="<li>You did not select the required amount of labs to register</li>";
	 	if(intval($reg_req->seminar)!=$seminar)
	 		$error_msg .= "<li>You did not select the required amount of seminars to register</li>";

	 	if($error_msg!="")
	 		return $error_msg;

	 	//get prerequisites for the course
	 	//check if the student meets these prerequisites

	 	//add schedule to student registered schedule
	 	foreach($schedules_crn as $crn)
	 	{
	 		$registered_schedule = new RegisteredSchedule;
		 	$registered_schedule->student_id = $student_id;
		 	$registered_schedule->schedule_id = Schedule::where('crn', '=', $crn)->first()->id;

		 	//check if that schedule was registered by the user before saving it
		 	$exists = RegisteredSchedule::where('student_id', '=',$registered_schedule->student_id)
		 				->where('schedule_id','=',$registered_schedule->schedule_id)->first();
		 	if(is_null($exists)){
		 		$registered_schedule->save();	
		 	}
		 	//TODO: whenever a error occurs during adding a schedule reset what was done before the error
		}
	 	//add course to student registered course
	 	$course_id = Schedule::where('crn', '=', $crn)->first()->course->id;
	 	$exists = RegisteredCourses::where('student_id','=',$student_id)->where('course_id','=',$course_id)->first();
	 
	 	if(is_null($exists)){
	 		$registered_courses = new RegisteredCourses;
	 		$registered_courses->student_id = $student_id;
	 		$registered_courses->course_id = $course_id;
	 		$registered_courses->save();
	 	}	
	 }
	 private static function get_registration_requirement($crn)
	 {
	 	$registration_requirements = Schedule::where('crn','=',$crn)->first()->course->registration_requirement;
	 	return $registration_requirements;
	 }
}



?>