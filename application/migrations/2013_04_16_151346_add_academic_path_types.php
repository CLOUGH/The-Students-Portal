<?php

class Add_Academic_Path_Types {    

	public function up()
    {
		DB::table('academic_path_types')->insert(array(
			'name'=>'core',
			'description'=>'Core is a course that is a core courses to complete a degree',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		)); 
		DB::table('academic_path_types')->insert(array(
			'name'=>'free elective',
			'description'=>'Core is a course that is a core courses to complete a degree',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

    }    

	public function down()
    {
    	DB::table('academic_path_types')->where('id', '=', '1')->delete();
    	DB::table('academic_path_types')->where('id', '=', '2')->delete();
	}

}