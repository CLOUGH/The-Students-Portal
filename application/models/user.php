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
		public function message_head()
		{
		    return $this->has_many('MessageHead','user_id');
		}

		public function full_name()
		{
			return $this->first_name . " " . $this->last_name;
		}

		public static function find_advisors(){
			$advisors = array(); 
	        $users = User::where("type", "=", "3")->get();
	        foreach($users as $user) {
	        	$advisors[$user->id] = $user->full_name();
	        }
	        return $advisors;
		}

		public static function find_students(){
			$students = array(); 
        	$users = User::where("type", "=", "2")->get();
        	foreach($users as $user) {
            	$students[$user->id] = $user->full_name();
       	    }

       	    return $students;
		}

		public function find_messageable_users() {
			if($this->type == "2"){
				$users = User::find_advisors();
			}
			elseif ($this->type == "3") {
				$users = User::find_students();
			}

			return $users;
		}
		// public function update($args)
		// {
		// 	$this->first_name=$args['first_name'];
		// 	$this->last_name=$args['last_name'];
		// 	$this->password=$args['new_password'];
		// }
	}
?>