<?php

class Add_Computer_Science_Degree_Courses {    

	public function up()
    {
		DB::table('degree_courses')->insert(array(
			'course_id'=>'5',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'6',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));		
		DB::table('degree_courses')->insert(array(
			'course_id'=>'7',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'8',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'9',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'1',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'2',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'4',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'10',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'14',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'15',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'16',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'17',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'18',
			'degree_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'5',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'6',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));		
		DB::table('degree_courses')->insert(array(
			'course_id'=>'7',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'8',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'9',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'2',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'10',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'17',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_courses')->insert(array(
			'course_id'=>'18',
			'degree_id'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
    }    

	public function down()
    {
		DB::table('degree_courses')->where('id', '=', '1')->delete();
		DB::table('degree_courses')->where('id', '=', '2')->delete();
		DB::table('degree_courses')->where('id', '=', '3')->delete();
		DB::table('degree_courses')->where('id', '=', '4')->delete();
		DB::table('degree_courses')->where('id', '=', '5')->delete();
		DB::table('degree_courses')->where('id', '=', '6')->delete();
		DB::table('degree_courses')->where('id', '=', '7')->delete();
		DB::table('degree_courses')->where('id', '=', '8')->delete();
		DB::table('degree_courses')->where('id', '=', '9')->delete();
		DB::table('degree_courses')->where('id', '=', '10')->delete();
		DB::table('degree_courses')->where('id', '=', '11')->delete();
		DB::table('degree_courses')->where('id', '=', '12')->delete();
		DB::table('degree_courses')->where('id', '=', '13')->delete();
		DB::table('degree_courses')->where('id', '=', '14')->delete();
		DB::table('degree_courses')->where('id', '=', '15')->delete();
		DB::table('degree_courses')->where('id', '=', '16')->delete();
		DB::table('degree_courses')->where('id', '=', '17')->delete();
		DB::table('degree_courses')->where('id', '=', '18')->delete();
		DB::table('degree_courses')->where('id', '=', '19')->delete();
		DB::table('degree_courses')->where('id', '=', '20')->delete();
		DB::table('degree_courses')->where('id', '=', '21')->delete();
		DB::table('degree_courses')->where('id', '=', '21')->delete();
		DB::table('degree_courses')->where('id', '=', '22')->delete();
		DB::table('degree_courses')->where('id', '=', '23')->delete();
    }

}