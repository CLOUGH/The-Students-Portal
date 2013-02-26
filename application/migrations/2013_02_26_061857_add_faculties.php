<?php

class Add_Faculties {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('faculties')->insert(array(
			'name'=> 'Pure and Applied Sciences',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('faculties')->insert(array(
			'name'=> 'Humanities',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('faculties')->insert(array(
			'name'=> 'Law',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('faculties')->insert(array(
			'name'=> 'Social Sciences',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('faculties')->insert(array(
			'name'=> 'Medical Sciences',
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
		DB::table('faculties')->where('name', '=', 'Pure and Applied Sciences')->delete();
		DB::table('faculties')->where('name', '=', 'Humanities')->delete();
		DB::table('faculties')->where('name', '=', 'Law')->delete();
		DB::table('faculties')->where('name', '=', 'Social Sciences')->delete();
		DB::table('faculties')->where('name', '=', 'Medical Sciences')->delete();					}

}