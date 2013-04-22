<?php	

	class MessageBody extends Eloquent 
	{
		public static $table='message_bodies';

		public function message_head()
		{
		    return $this->belongs_to('MessageHead');
		}
		public function from_user(){
			return $this->has_one('User');
		}
	}
?>