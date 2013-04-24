<?php
class AcademicPathCourse extends Eloquent
{
	public static $table = "academic_path_courses";
	public function academic_path()
	{
	    return $this->belongs_to("AcademicPath","academic_path_id");
	}

	public function course()
	{
	    return $this->belongs_to("Course",'course_id');
	}

	public function academic_path_type()
	{
	    return $this->has_one("AcademicPathType");
	}
}
?>