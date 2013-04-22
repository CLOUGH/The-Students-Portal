<?php	

	class MessageBody extends Eloquent 
	{
		public static $table='message_bodies';

		public function message_head()
		{
		    return $this->belongs_to('MessageHead','message_head_id');
		}
		public function from_user(){
			return $this->has_one('User');
		}
	}
?>