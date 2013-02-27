<?php

class Add_Courses {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		
		DB::table('courses')->insert(array(
			'title'=>'Net-Centric',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2190',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Analysis of Algorithms',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2111',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));	
		DB::table('courses')->insert(array(
			'title'=>'Introduction to Electronics',
			'subject'=>'Electronics',
			'type'=>'theory',
			'code'=>'ElECT1400',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'1',
			'credit'=>'3',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Object Technology',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2170',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'',
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
		DB::table('courses')->where('code', '=', 'COMP2190')->delete();
		DB::table('courses')->where('code', '=', 'COMP2111')->delete();
		DB::table('courses')->where('code', '=', 'ElECT1400')->delete();
		DB::table('courses')->where('code', '=', 'COMP2170')->delete();
	}

}