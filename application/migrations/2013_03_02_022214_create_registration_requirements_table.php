<?php

class Create_Registration_Requirements_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registration_requirements', function($table){
			$table->increments('id');
			$table->integer('course_id')->unique();
			$table->integer('lectures');
			$table->integer('tutorials');
			$table->integer('labs');
			$table->integer('seminar');
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
		Schema::drop('registration_requirements');
	}

}