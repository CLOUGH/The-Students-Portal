<?php

class Add_Schedules {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		
		//Net-Centric
		DB::table('schedules')->insert(array(
			'course_id'=>'1',
			'crn'=>'3434323',
			'max_capacity'=>'200',
			'registered_students'=>'0',
			'schedule_type_id'=>'1',
			'start_time'=>'09:00:00',
			'end_time'=>'11:00:00',
			'room_id'=>'2',
			'day'=>'Mon',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedules')->insert(array(
			'course_id'=>'1',
			'crn'=>'356233',
			'max_capacity'=>'200',
			'registered_students'=>'0',
			'schedule_type_id'=>'1',
			'start_time'=>'15:00:00',
			'end_time'=>'16:00:00',
			'room_id'=>'1',
			'day'=>'Fri',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedules')->insert(array(
			'course_id'=>'1',
			'crn'=>'45664333',
			'max_capacity'=>'20',
			'registered_students'=>'0',
			'schedule_type_id'=>'2',
			'start_time'=>'10:00:00',
			'end_time'=>'11:00:00',
			'room_id'=>'4',
			'day'=>'Fri',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedules')->insert(array(
			'course_id'=>'1',
			'crn'=>'45633',
			'max_capacity'=>'20',
			'registered_students'=>'0',
			'schedule_type_id'=>'2',
			'start_time'=>'8:00:00',
			'end_time'=>'9:00:00',
			'room_id'=>'4',
			'day'=>'Wed',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		//Analysis of Algorithms
		DB::table('schedules')->insert(array(
			'course_id'=>'2',
			'crn'=>'323',
			'max_capacity'=>'200',
			'registered_students'=>'0',
			'schedule_type_id'=>'1',
			'start_time'=>'16:00:00',
			'end_time'=>'17:00:00',
			'room_id'=>'2',
			'day'=>'Mon',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedules')->insert(array(
			'course_id'=>'2',
			'crn'=>'67333',
			'max_capacity'=>'200',
			'registered_students'=>'0',
			'schedule_type_id'=>'1',
			'start_time'=>'13:00:00',
			'end_time'=>'14:00:00',
			'room_id'=>'2',
			'day'=>'Tue',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedules')->insert(array(
			'course_id'=>'2',
			'crn'=>'49031333',
			'max_capacity'=>'200',
			'registered_students'=>'0',
			'schedule_type_id'=>'1',
			'start_time'=>'11:00:00',
			'end_time'=>'12:00:00',
			'room_id'=>'2',
			'day'=>'Fri',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('schedules')->insert(array(
			'course_id'=>'2',
			'crn'=>'0341223',
			'max_capacity'=>'20',
			'registered_students'=>'0',
			'schedule_type_id'=>'2',
			'start_time'=>'12:00:00',
			'end_time'=>'13:00:00',
			'room_id'=>'4',
			'day'=>'Thur',
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
		DB::table('schedules')->where('id','=','1')->delete();
		DB::table('schedules')->where('id','=','2')->delete();
		DB::table('schedules')->where('id','=','3')->delete();
		DB::table('schedules')->where('id','=','4')->delete();
		DB::table('schedules')->where('id','=','5')->delete();
		DB::table('schedules')->where('id','=','6')->delete();
		DB::table('schedules')->where('id','=','7')->delete();
		DB::table('schedules')->where('id','=','8')->delete();
	}

}