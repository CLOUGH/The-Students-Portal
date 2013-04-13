<?php

class Add_Level_Types {    

	public function up()
    {
		DB::table('level_types')->insert(array(
			'name'=>'Undergraduate',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('level_types')->insert(array(
			'name'=>'Post-Graduate',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

    }    

	public function down()
    {
		DB::table('level_types')->where('id', '=', '1')->delete();
    	DB::table('level_types')->where('id', '=', '2')->delete();
    }

}