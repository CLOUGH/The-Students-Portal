<?php

class Create_Students_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students',function($table){
			$table->increments('id');
			$table->integer('user_id')->unique();
			$table->integer('student_id')->unique();
			$table->integer('faculty_id');
			$table->string('associated_hall');
			$table->integer('student_type_id');
			$table->string('major');
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
		Schema::drop('students');
	}

}