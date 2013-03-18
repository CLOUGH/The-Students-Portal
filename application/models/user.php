<?php 
	class User extends Eloquent
	{
		public function student(){
		 	return $this->has_one('Student');
		}
		public function user_type()
		{
			return $this->belongs_to('UserType','type');
		}
	}
?>