<?php

class Add_Degree_Types {    

	public function up()
    {
		DB::table('degree_types')->insert(array(
			'name'=>'major',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degree_types')->insert(array(
			'name'=>'minor',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

    }    

	public function down()
    {
    	DB::table('degrees')->where('id', '=', '1')->delete();
    	DB::table('degrees')->where('id', '=', '2')->delete();
    }

}