<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('username')->unique();
			$table->integer('type');
			$table->string('email')->unique();
			$table->text('password',60);
			$table->integer('is_main');
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
		Schema::drop('users');
	}

}