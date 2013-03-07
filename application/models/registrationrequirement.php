<?php

class RegistrationRequirement extends Eloquent 
{
	public static $table="registration_requirements";
	public function course()
	{
		return $this->belongs_to("Course");
	}
}