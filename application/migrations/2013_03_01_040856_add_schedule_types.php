<?php

class Add_Schedule_Types {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('schedule_types')->insert(array(
			'name'=>'Lecture',						
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedule_types')->insert(array(
			'name'=>'Tutorial',						
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedule_types')->insert(array(
			'name'=>'Lab',						
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedule_types')->insert(array(
			'name'=>'Seminar',						
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
		DB::table('schedule_types')->where('name','=','Seminar')->delete();
		DB::table('schedule_types')->where('name','=','Lab')->delete();
		DB::table('schedule_types')->where('name','=','Tutorial')->delete();
		DB::table('schedule_types')->where('name','=','Lecture')->delete();
	}

}