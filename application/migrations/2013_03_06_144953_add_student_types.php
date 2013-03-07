<?php

class Add_Student_Types {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('student_types')->insert(array(
				'name'=>'full time',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('student_types')->insert(array(
				'name'=>'part time',
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
		DB::table('student_types')->where('id','=','1')->delete();
		DB::table('student_types')->where('id','=','2')->delete();
	}

}