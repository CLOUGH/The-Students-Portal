<?php

class Create_Academic_Path_Table {    

	public function up()
    {
		Schema::create('academic_paths', function($table) {
			$table->integer('degree_id');
			$table->text('description');
			$table->integer('student_id');
			$table->increments('id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('academic_paths');

    }

}