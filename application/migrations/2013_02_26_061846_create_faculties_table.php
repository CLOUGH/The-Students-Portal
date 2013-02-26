<?php

class Create_Faculties_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faculties', function($table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('description')->nullable();
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
		Schema::drop('faculties');
	}

}