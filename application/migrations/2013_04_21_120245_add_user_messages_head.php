<?php

class Add_User_Messages_Head {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		DB::table('message_heads')->insert(array(
			'to'=>'5',
			'user_id'=>'2',
			'subject'=>'Test',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::table('message_heads')->where('id', '=', '1')->delete();
	}

}
