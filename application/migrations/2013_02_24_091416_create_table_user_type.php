<?php

class Create_Table_User_Type {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_types', function($table){
			$table->increments('id');
			$table->string('name')->unique();
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
		Schema::drop('user_types');
	}

}