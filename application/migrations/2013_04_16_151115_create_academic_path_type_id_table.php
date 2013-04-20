<?php

class Create_Academic_Path_Type_Id_Table {    

	public function up()
    {
		Schema::create('academic_path_types', function($table) {
			$table->string("name");
			$table->text("description");
			$table->increments('id');
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('academic_path_types');
    }

}