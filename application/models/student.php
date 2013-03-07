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
}
?>