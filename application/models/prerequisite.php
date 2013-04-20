<?php 
class PreRequisite extends Eloquent
{
	public static $table ="pre_requisites";
	public function course()
	{
	    return $this->belongs_to("Course","required_course_id");
	}

}
?>