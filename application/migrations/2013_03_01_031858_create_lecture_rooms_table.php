<?php

class Create_Lecture_Rooms_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lecture_rooms', function($table){
			$table->increments('id');
			$table->string('initials')->unique();
			$table->string('name');			
			$table->text('description');
			$table->integer('capacity');
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
		Schema::drop('lecture_rooms');
	}

}