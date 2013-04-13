<?php

class CompletedCourse extends Eloquent 
{
	public static $table="completed_courses";

	public function student(){
		return $this->belongs_to('Student');
	}
	public function course()
	{
		return $this->belongs_to('Course');
	}
}