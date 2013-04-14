<?php

class Student extends Eloquent 
{
	public function user()
	{
		return $this->belongs_to('User');
	}
	public function faculty()
	{
		return $this->belongs_to('Faculty');
	}
	public function student_type()
	{
		return $this->belongs_to('StudentType', 'student_type_id');
	}
	public function courses()
	{
		return $this->has_many_and_belongs_to('Course','registered_courses');
	}
	public function schedules()
	{
		return $this->has_many_and_belongs_to('Schedule','registered_schedules');
	}
	public function level_type()
	{
		return $this->belongs_to('LevelType');
	}
	public function completed_courses()
	{
		return $this->has_many('CompletedCourse');
	}

	public function get_completed_courses_by_semester()
	{
		$completed_courses = array();

		foreach($this->completed_courses as $completed_course)
		{
			$array_key = $this->hash_semester($completed_course->date_started);
			
			if(!array_key_exists($array_key, $completed_courses))
				$completed_courses[$array_key] = array();
			
			array_push($completed_courses[$array_key], $completed_course);
		}
		return $completed_courses;
	}
	private function hash_semester($start_date)
	{
		$hash_key="";
		$parsed_date= preg_split('/[-]/',$start_date);
		
		if(intval($parsed_date[1])<5)	//if the start month began before june then its the second simester
		{
			$hash_key="S".$parsed_date[0];
		}
		else if(intval($parsed_date[1])>=9)
		{
			$hash_key="A".$parsed_date[0];
		}
		else 
		{
			$hash_key="SU".$parsed_date[0];
		}
		return $hash_key;
	}
	public static function parse_semester_key($array_key)
	{
		if($array_key[0]=='S')
		{
			
			if($array_key[1]!='U')
			{
				$year = substr($array_key, 1);
				return "2nd Semester of ".(intval($year)-1)."/".$year." Academic Year";
			}
			else
			{
				$year = substr($array_key, 2);
				return "Summer of ".$year;
			}
		}
		elseif($array_key[0]=='A')
		{
			$year = substr($array_key, 1);
			return "1st Semester of ".$year."/".(intval($year)+1)." Academic Year";
		}
	}
}
?>