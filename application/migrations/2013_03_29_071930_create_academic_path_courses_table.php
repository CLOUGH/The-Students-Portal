<?php

class Create_Academic_Path_Courses_Table {    

	public function up()
    {
		Schema::create('academic_path_courses', function($table) {

			$table->integer('academic_path_id');
			$table->integer('course_id');
			$table->string('year')->default('');
			$table->boolean('is_requirement_met');
			$table->boolean('is_passed_course');
			$table->boolean('is_completed_course');
			$table->boolean('is_course_registered');
			$table->boolean('is_required_course_registered');
			$table->boolean('is_override');
			$table->boolean('is_required_course_degree_course');
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