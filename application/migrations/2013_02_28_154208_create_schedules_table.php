<?php

class Create_Schedules_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function($table){
			$table->increments('id');
			$table->integer('course_id');
			$table->string('crn')->unique();
			$table->integer('max_capacity');
			$table->integer('registered_students');
			$table->integer('schedule_type_id');
			$table->time('start_time');
			$table->time('end_time');
			$table->string('day');
			$table->integer('room_id');
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
		Schema::drop('schedules');
	}

}
?>