<?php

class Add_Registered_Courses {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		
		DB::table('registered_courses')->insert(array(
				'student_id'=>'1',
				'course_id'=>'1',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('registered_courses')->insert(array(
				'student_id'=>'1',
				'course_id'=>'2',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('registered_courses')->insert(array(
				'student_id'=>'2',
				'course_id'=>'3',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('registered_courses')->insert(array(
				'student_id'=>'2',
				'course_id'=>'18',
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
		//
		DB::table('registered_courses')->where('id','=','1')->delete();
		DB::table('registered_courses')->where('id','=','2')->delete();
		DB::table('registered_courses')->where('id','=','3')->delete();
		DB::table('registered_courses')->where('id','=','4')->delete();
	}
}