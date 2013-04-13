<?php

class Create_Level_Types_Table {    

	public function up()
    {
		Schema::create('level_types', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('level_types');
    }

}