<?php

class Add_Course_Pre_Requisites {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'7',
			'required_course_id'=>'5',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'7',
			'required_course_id'=>'6',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'1',
			'required_course_id'=>'5',
			'linked_mandatory'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'1',
			'required_course_id'=>'6',
			'linked_mandatory'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'2',
			'required_course_id'=>'7',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'4',
			'required_course_id'=>'7',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'10',
			'required_course_id'=>'7',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'14',
			'required_course_id'=>'2',
			'linked_mandatory'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'14',
			'required_course_id'=>'17',
			'linked_mandatory'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'15',
			'required_course_id'=>'17',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'18',
			'required_course_id'=>'7',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'17',
			'required_course_id'=>'7',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'6',
			'required_course_id'=>'10',
			'linked_mandatory'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('pre_requisites')->insert(array(
			'course_id'=>'16',
			'required_course_id'=>'10',
			'linked_mandatory'=>'0',
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
		DB::table('pre_requisites')->where('id','=','1');
		DB::table('pre_requisites')->where('id','=','2');
		DB::table('pre_requisites')->where('id','=','3');
	}

}