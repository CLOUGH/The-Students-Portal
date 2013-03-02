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
			'course_id'=>'1',
			'required_course_id'=>'3',
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
	}

}