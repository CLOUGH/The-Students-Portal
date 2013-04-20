<?php

class Create_Course_Pre_Requisites_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pre_requisites', function($table){
			$table->increments('id');
			$table->integer('course_id');
			$table->boolean('linked_mandatory');
			$table->integer('required_course_id');
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
		Schema::drop('pre_requisites');
	}

}