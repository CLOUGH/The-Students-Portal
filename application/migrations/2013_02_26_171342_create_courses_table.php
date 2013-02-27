<?php

class Create_Courses_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('subject');
			$table->string('type');
			$table->string('code')->unique();
			$table->integer('faculty_id');
			$table->string('semester');
			$table->integer('level');
			$table->integer("credit");
			$table->text('description');
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
		Schema::drop('courses');
	}

}