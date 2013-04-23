<?php	

	class MessageHead extends Eloquent 
	{
		public static $table='message_heads';

		public function message_body(){
			return $this->has_many('MessageBody','message_head_id');
		}
		public function user(){
			return $this->belongs_to('User');
		}

		public function receiver(){
			return User::find($this->to);
		}
		public function to_user(){
			return $this->has_one('User','to');
		}

		public function body(){
			return $this->message_body[0]->message_body;
 		}

 		public function excerpt(){
 			return substr($this->body(), 0, 10) . "&hellip;";
 		}
	}
?>