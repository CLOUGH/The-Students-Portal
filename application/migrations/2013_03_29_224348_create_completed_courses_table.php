<?php

class Create_Completed_Courses_Table {    

	public function up()
    {
		Schema::create('completed_courses', function($table) {
			$table->integer('course_id');
			$table->integer('student_id');
			$table->date('date_started');
			$table->date('date_completed');
			$table->string('grade');
			$table->increments('id');
			$table->timestamps();
		});

    }    

	public function down()
    {
		Schema::drop('completed_courses');

    }

}