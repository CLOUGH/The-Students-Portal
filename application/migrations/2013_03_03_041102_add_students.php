<?php

class Add_Students {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('students')->insert(array(
			'student_id'=>'620040027',
			'user_id'=>'2',
			'faculty_id'=>'1',
			'associated_hall'=>'Chancellor',
			'student_type_id'=>'1',
			'major'=>'Computer Science',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('students')->insert(array(
			'student_id'=>'620043090',
			'user_id'=>'4',
			'faculty_id'=>'1',
			'associated_hall'=>'Taylor',
			'student_type_id'=>'1',
			'major'=>'Computer Science',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('students')->insert(array(
			'student_id'=>'620043152',
			'user_id'=>'7',
			'faculty_id'=>'1',
			'associated_hall'=>'Preston',
			'student_type_id'=>'1',
			'major'=>'Computer Science',
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
		DB::table('students')->where('id','=','1')->delete();
		DB::table('students')->where('id','=','2')->delete();
		DB::table('students')->where('id','=','3')->delete();

	}

}