<?php

class Add_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(array(
				'first_name'=> 'Warren',
				'last_name'=> 'Clough',
				'username'=> 'clough',
				'password'=> Hash::make('gtx@6075'),
				'type'=> '1',
				'email'=>'clough.warren@gmail.com',
				'is_main'=>'1',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('users')->insert(array(
				'first_name'=> 'Warren',
				'last_name'=> 'Clough',
				'username'=> 'cloughax',
				'password'=>Hash::make('gtx@6075'),
				'type'=> '2',
				'email'=>'clough_warren@hotmail.com',
				'is_main'=>'0',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('users')->insert(array(
				'first_name'=> 'Shane',
				'last_name'=> 'Campbell',
				'username'=> 'shane',
				'password'=>Hash::make('pass1234'),
				'type'=> '1',
				'email'=>'shanec132006@hotmail.com',
				'is_main'=>'0',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
			DB::table('users')->insert(array(
				'first_name'=> 'Shane',
				'last_name'=> 'Campbell',
				'username'=> 'shanec132006',
				'password'=>Hash::make('pass1234'),
				'type'=> '2',
				'email'=>'shanec132006@gmail.com',
				'is_main'=>'0',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));

		DB::table('users')->insert(array(
				'first_name'=> 'Kerry-Ann',
				'last_name'=> 'Malcomb',
				'username'=> 'kerry',
				'password'=>Hash::make('pass1234'),
				'type'=> '3',
				'email'=>'kerry@hotmail.com',
				'is_main'=>'0',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('users')->insert(array(
				'first_name'=> 'Janiel',
				'last_name'=> 'Thomas',
				'username'=> 'janiel123',
				'password'=>Hash::make('pass1234'),
				'type'=> '1',
				'email'=>'Janeil_thomas2@gmail.com',
				'is_main'=>'0',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('users')->insert(array(
				'first_name'=> 'Janiel',
				'last_name'=> 'Thomas',
				'username'=> 'janiel',
				'password'=>Hash::make('pass1234'),
				'type'=> '2',
				'email'=>'Janeil_thomas@gmail.com',
				'is_main'=>'0',
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
		DB::table('users')->where('username', '=', 'clough')->delete();
		DB::table('users')->where('username', '=', 'cloughax')->delete();
		DB::table('users')->where('username', '=', 'shanec132006')->delete();
		DB::table('users')->where('username', '=', 'shane')->delete();
		DB::table('users')->where('username', '=', 'kerry')->delete();
		DB::table('users')->where('username', '=', 'janiel')->delete();
		DB::table('users')->where('username', '=', 'janiel123')->delete();


	}

}