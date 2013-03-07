<?php

class Add_Registered_Schedules {    

	public function up()
    {
		DB::table('registered_schedules')->insert(array(
			'student_id'=>'1',
			'schedule_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('registered_schedules')->insert(array(
			'student_id'=>'1',
			'schedule_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('registered_schedules')->insert(array(
			'student_id'=>'1',
			'schedule_id'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
    }    
	public function down()
    {
		DB::table('registered_schedules')->where('id','=','1')->delete();
		DB::table('registered_schedules')->where('id','=','2')->delete();
		DB::table('registered_schedules')->where('id','=','2')->delete();
    }

}