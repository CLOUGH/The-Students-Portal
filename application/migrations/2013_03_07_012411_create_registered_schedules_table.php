<?php

class Create_Registered_Schedules_Table {    

	public function up()
    {
		Schema::create('registered_schedules', function($table) {
			$table->increments('id');
			$table->integer('schedule_id');
			$table->integer('student_id');
			$table->timestamps();
		});

    }    
	public function down()
    {
		Schema::drop('registered_schedules');
    }

}