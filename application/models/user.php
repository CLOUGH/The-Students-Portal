<?php 
	class User extends Eloquent
	{
		public function student(){
		 	return $this->has_one('Student');
		}
	}
?>