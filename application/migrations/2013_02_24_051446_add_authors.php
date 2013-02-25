<?php

class Add_Authors {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('authors')->insert(array(
				'name'=> 'Warren Clough',
				'bio'=> 'Warren Clough is a great author!',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('authors')->insert(array(
				'name'=> 'Shane Campbell',
				'bio'=> 'Shane Campbell is a great author too!',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('authors')->insert(array(
				'name'=> 'Andrew Perkins',
				'bio'=> 'Andrew is the tutorial tutor for this guide on laravel!',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('authors')->insert(array(
				'name'=> 'Andre Evans',
				'bio'=> 'Andre Evans is the worst author in the world',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('authors')->where('name', '=', 'Warren Clough')->delete();
		DB::table('authors')->where('name', '=', 'Shane Campbell')->delete();
		DB::table('authors')->where('name', '=', 'Andrew Perkins')->delete();
		DB::table('authors')->where('name', '=', 'Andre Evans')->delete();
	}

}