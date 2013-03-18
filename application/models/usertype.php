<?php

class UserType extends Eloquent 
{
	public static $table="user_types";

	public function user()
	{
		return $this->has_many('User');
	}
}
?>