<?php

class Create_Student_Types_Table {    

	public function up()
    {
		Schema::create('student_types', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description')->nullable();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('student_types');

    }

}