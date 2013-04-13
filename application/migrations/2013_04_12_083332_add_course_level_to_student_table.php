<?php

class Add_Course_Level_To_Student_Table {    

	public function up()
    {
		Schema::table('students', function($table) 
		{
			$table->integer("level_type_id");
		});
    }    

	public function down()
    {
		Schema::table('students', function($table) {
			$table->drop_column("level_type_id");
		});
    }
}