<?php

class Create_Degree_Type_Table {    

	public function up()
    {
		Schema::create('degree_types', function($table) {
			$table->string('name');
			$table->text('description');
			$table->increments('id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('degree_types');

    }

}