<?php

class Create_Degree_Table {    

	public function up()
    {
		Schema::create('degrees', function($table) {
			$table->string('name');
			$table->text('description');
			$table->integer('degree_type_id');
			$table->increments('id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('degrees');

    }

}