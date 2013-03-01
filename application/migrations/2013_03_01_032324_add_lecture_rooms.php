<?php

class Add_Lecture_Rooms {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('lecture_rooms')->insert(array(
			'initials'=>'CH_C2',
			'name'=>'Chemistry Lecture Theater Room 2',			
			'description'=>'The room can be found at Pure and Applied Faculty and is
							located in the Chemistry Department.',
			'capacity'=>'200',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('lecture_rooms')->insert(array(
			'initials'=>'SLT',
			'name'=>'Science Lecture Theater',			
			'description'=>'The room can be found at Pure and Applied Faculty and is
							located near the faculty library.',
			'capacity'=>'300',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('lecture_rooms')->insert(array(
			'initials'=>'CS_TUT RM1',
			'name'=>'Computer Science Tutorial Room 1',			
			'description'=>'The room can be found at Pure and Applied Faculty and is
							located in the Computer Science Lab in the department building.',
			'capacity'=>'20',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('lecture_rooms')->insert(array(
			'initials'=>'CS_TUT RM2',
			'name'=>'Computer Science Tutorial Room 2',			
			'description'=>'The room can be found at Pure and Applied Faculty and is
							located in beside the Mathematics Department.',
			'capacity'=>'20',
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
		DB::table('lecture_rooms')->where('initials','=', 'CS_TUT RM2')->delete();
		DB::table('lecture_rooms')->where('initials','=', 'CS_TUT RM1')->delete();
		DB::table('lecture_rooms')->where('initials','=', 'SLT')->delete();
		DB::table('lecture_rooms')->where('initials','=', 'CH_C2')->delete();
	}

}