<?php 
class Course extends Eloquent{
	public static $table = "courses";
	public static function get_course_detail($id)
	{
		$sql = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
					->where('courses.id', '=', $id);

		$course_detail = $sql->first(array('courses.id','courses.code','courses.title', 'courses.level',
						'courses.semester','faculties.name as faculty','courses.credit','courses.description'));
	
		return $course_detail;
		
	}
	public static function get_pre_requisites($course_id)
	{
	
		return DB::table('pre_requisites')->join('courses','pre_requisites.required_course_id','=','courses.id')
										->where('pre_requisites.course_id','=',$course_id)
										->get(array('courses.id as course_id','courses.code','courses.title'));
	}
	public static function get_course_schedules($course_id)
	{
		return DB::table('schedules')->join('schedule_types','schedule_types.id','=','schedules.schedule_type_id')
						->join('lecture_rooms','lecture_rooms.id','=','schedules.room_id')
						->where('schedules.course_id','=',$course_id)
						->get(array('schedule_types.name as type', 'lecture_rooms.initials as room_initial',
									'lecture_rooms.name as room_name', 'lecture_rooms.description as room_description',
									'schedules.crn', 'schedules.max_capacity','schedules.start_time','schedules.end_time',
									'schedules.day'));
	}
	public static function get_registration_requirements($course_id)
	{
		return DB::table('registration_requirements')->where('course_id','=',$course_id)->first();
	}
	public static function army_to_normal_time($time)
	{
		
		list($hour,$min,$sec) = preg_split('/[:]/',$time);
		if(intval($hour)>=12)
			return intval(intval($hour)==12?$hour:intval($hour)-12).':'.$min." PM";
		else
			return intval(intval($hour)==0?12:$hour).':'.$min." AM";
	}
	public function student()
	{
		return $this->has_many_and_belongs_to('Student','registered_courses');
	}
	public function faculty()
	{
		return $this->belongs_to('Faculty');
	}
	public function registration_requirement()
	{
		return $this->has_one('RegistrationRequirement');
	}
	public static function search_course($args,$is_detailed_search)
		{
			if(count($args)==0)
			{
				$courses = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
						->get(array('courses.id','courses.code','courses.title', 'courses.level',
							'courses.semester','faculties.name as faculty','courses.credit'));
				return $courses;
			}else if(!$is_detailed_search)
			{
				
				$sql = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
						->where('title', 'LIKE',"%$args[course_name]%")
						->where('code', 'LIKE', "%$args[course_code]%")
						->where('subject', 'LIKE', "%$args[subject]%");
				if($args['level']!='all')
					$sql= $sql->where('level', '=',"$args[level]");
				if($args['credit_range_min']!='')
					$sql = $sql->where('credit','>',"$args[credit_range_min]");
				if($args['credit_range_max']!='')
					$sql = $sql->where('credit','<',"$args[credit_range_max]");
				if($args['semester']!='all')
					$sql = $sql->where('semester','=',"$args[semester]");

				$courses = $sql->get(array('courses.id','courses.code','courses.title', 'courses.level',
							'courses.semester','faculties.name as faculty','courses.credit'));
				return $courses;
			}
		}
	public static function encode_url($var)
	{
		return urlencode(base64_encode($var.'~'));
	}
	public static function decode_url($url)
	{
		return substr(base64_decode($url),0, strrpos(base64_decode($url),'~',-1) );
	}
		
}
?>