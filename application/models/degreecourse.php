<?php
class DegreeCourse extends Eloquent
{
	public static $table = "degree_courses";

	public function course()
	{
		return $this->belongs_to("Course");
	}
	public function degree()
	{
		return $this->belongs_to("Degree");
	}
}
?>