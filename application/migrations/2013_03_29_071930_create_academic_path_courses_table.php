<?php

class Create_Academic_Path_Courses_Table {    

	public function up()
    {
		Schema::create('academic_path_courses', function($table) {
			$table->integer('academic_path_id');
			$table->integer('course_id');
			$table->date('year');
			$table->integer('academic_path_type_id');
			$table->increments('id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('academic_path_courses');

    }

}