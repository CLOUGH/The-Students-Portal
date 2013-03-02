<?php

class Add_Registration_Requirements {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('registration_requirements')->insert(array(
			'course_id'=>'1',
			'lectures'=>'2',
			'tutorials'=>'1',
			'labs'=>'0',
			'seminar'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('registration_requirements')->insert(array(
			'course_id'=>'2',
			'lectures'=>'3',
			'tutorials'=>'1',
			'labs'=>'0',
			'seminar'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('registration_requirements')->insert(array(
			'course_id'=>'3',
			'lectures'=>'3',
			'tutorials'=>'1',
			'labs'=>'0',
			'seminar'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('registration_requirements')->insert(array(
			'course_id'=>'4',
			'lectures'=>'3',
			'tutorials'=>'1',
			'labs'=>'0',
			'seminar'=>'0',
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
		DB::table('registration_requirements')->where('course_id', '=', '1')->delete();
		DB::table('registration_requirements')->where('course_id', '=', '2')->delete();
		DB::table('registration_requirements')->where('course_id', '=', '3')->delete();
		DB::table('registration_requirements')->where('course_id', '=', '4')->delete();
	}

}