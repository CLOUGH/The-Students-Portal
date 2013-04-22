<?php

class Recieved_Messages_Body {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('message_bodies', function($table) {
			$table->integer('user_id');
			$table->integer('message_head_id');
			$table->string('message_body');
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
		Schema::drop('message_bodies');
	}

}