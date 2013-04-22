<?php	

	class MessageHead extends Eloquent 
	{
		public static $table='message_heads';

		public function message_body(){
			return $this->has_many('MessageBody');
		}
		public function user(){
			return $this->belongs_to('User');
		}
		public function to_user(){
			return $this->has_one('User','to');
		}

	}
?>