<?php
class AcademicPathCourse extends Eloquent
{
	public function academic_path()
	{
	    return $this->belongs_to("AcademicPath");
	}

	public function course()
	{
	    return $this->has_one("Course");
	}

	public function academic_path_type()
	{
	    return $this->has_one("AcademicPathType");
	}
}
?>