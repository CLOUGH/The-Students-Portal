<?php

class Create_User_Messages_Head {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
			Schema::create('message_heads', function($table) {
			$table->integer('to');
			$table->integer('user_id');
			$table->string('subject');
			$table->increments('id');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('message_heads');
	}

}