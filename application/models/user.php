<?php 
	class User extends Eloquent
	{
		public static $rules = array(

			'first_name'=>'required|min:2',
			'last_name'=>'required|min:2');

		public static function validate($data){
			return Validator::make($data, static::$rules);
		}
		public function student(){
		 	return $this->has_one('Student');
		}
		public function user_type()
		{
			return $this->belongs_to('UserType','type');
		}
		// public function update($args)
		// {
		// 	$this->first_name=$args['first_name'];
		// 	$this->last_name=$args['last_name'];
		// 	$this->password=$args['new_password'];
		// }
	}
?>