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
			$table->interger('student_id');
		})
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