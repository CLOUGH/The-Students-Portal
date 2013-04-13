<?php

class Create_Degree_Courses_Table {    

	public function up()
    {
		Schema::create('degree_courses', function($table) {
			$table->integer('course_id');
			$table->integer('degree_id');
			$table->increments('id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('degree_courses');

    }

}