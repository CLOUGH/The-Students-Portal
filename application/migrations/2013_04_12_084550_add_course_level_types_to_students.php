<?php

class Add_Course_Level_Types_To_Students {    

	public function up()
    {
		DB::table('students')
			->where('id','=','1')
			->update(array('level_type_id' => '1'));

    }    

	public function down()
    {
		

    }

}