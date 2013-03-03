<?php

class Create_Transcript_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transcript', function($table){
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
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
		Schema::drop('transcript');
	}

}