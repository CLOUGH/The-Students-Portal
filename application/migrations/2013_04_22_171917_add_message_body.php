<?php

class Add_Message_Body {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('message_bodies')->insert(array(			
			'user_id'=>'2',
			'message_head_id'=>'1',
			'message_body'=>'this is a test',
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
		DB::table('message_bodies')->where('id', '=', '1')->delete();

	}

}