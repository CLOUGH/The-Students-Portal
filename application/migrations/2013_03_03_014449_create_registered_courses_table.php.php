<?php

class Create_Registered_Courses_Table_Php {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registered_courses',function($table){
			$table->increments('id');
			$table->integer('student_id');
			$table->integer('course_id');
			$table->timestamp();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registered_course');
	}

}