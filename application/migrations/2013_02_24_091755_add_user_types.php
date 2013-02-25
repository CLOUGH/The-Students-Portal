<?php

class Add_User_Types {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('user_types')->insert(array(
				'name'=> 'admin',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('user_types')->insert(array(
				'name'=> 'student',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('user_types')->insert(array(
				'name'=> 'advisor',
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
		DB::table('user_types')->where('name', '=', 'admin')->delete();
		DB::table('user_types')->where('name', '=', 'student')->delete();
		DB::table('user_types')->where('name', '=', 'advisor')->delete();
	}

}