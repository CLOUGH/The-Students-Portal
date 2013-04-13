<?php

class Add_Completed_Courses_For_Warren_Clough {    

	public function up()
    {
		DB::table('completed_courses')->insert(array(
			'course_id'=>'5',
			'student_id'=>'1',
			'date_started'=>'2011-09-05',
			'date_completed'=>'2011-12-23',
			'grade'=>'A',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('completed_courses')->insert(array(
			'course_id'=>'6',
			'student_id'=>'1',
			'date_started'=>'2011-09-05',
			'date_completed'=>'2011-12-23',
			'grade'=>'A-',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('completed_courses')->insert(array(
			'course_id'=>'8',
			'student_id'=>'1',
			'date_started'=>'2011-09-05',
			'date_completed'=>'2011-12-23',
			'grade'=>'A-',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('completed_courses')->insert(array(
			'course_id'=>'7',
			'student_id'=>'1',
			'date_started'=>'2012-02-20',
			'date_completed'=>'2012-05-30',
			'grade'=>'A',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('completed_courses')->insert(array(
			'course_id'=>'9',
			'student_id'=>'1',
			'date_started'=>'2012-02-20',
			'date_completed'=>'2012-05-30',
			'grade'=>'A',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));

    }    

	public function down()
    {
		DB::table('completed_courses')->where('id', '=', '1');
		DB::table('completed_courses')->where('id', '=', '2');
		DB::table('completed_courses')->where('id', '=', '3');
		DB::table('completed_courses')->where('id', '=', '4');
		DB::table('completed_courses')->where('id', '=', '5');
    }

}