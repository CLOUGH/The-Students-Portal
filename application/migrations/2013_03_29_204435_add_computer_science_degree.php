<?php

class Add_Computer_Science_Degree {    

	public function up()
    {
		DB::table('degrees')->insert(array(
			'name'=>'B.Sc. in Computer Science',
			'description'=>'<p>The Computer Science undergraduate programme aims to:<\/p>
							<ul>
								<li>
									Provide students with the educational experiences that will enable them 
									to cope with the rapidly changing subject of Computer Science.
								<\/li>
								<li>
									Provide students with up-to-date training in the discipline so as to prepare 
									them to take on entry level positions in the local Information Technology sector, 
									(with the exception of hardware engineer and technician) and to grow into other positions
									 with one or two years working experience.
								<\/li>
									Provide students with a sufficiently broad range of courses to enable them to be successful 
									in postgraduate programmes anywhere in the world.
								<\/li>
								<li>
									Employ a range of assessment methods and techniques and to enable students to demonstrate the 
									depth of their understanding and their capacity for independent thought.
								<\/li>
								<li>
									Give students support and guidance in what, for most students, is a new discipline.
								<\/li>
							<\/ul>',
			'degree_type_id'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('degrees')->insert(array(
			'name'=>'B.Sc. in Computer Science',
			'description'=>'<p>The Computer Science undergraduate programme aims to:<\/p>
							<ul>
								<li>
									Provide students with the educational experiences that will enable them 
									to cope with the rapidly changing subject of Computer Science.
								<\/li>
								<li>
									Provide students with up-to-date training in the discipline so as to prepare 
									them to take on entry level positions in the local Information Technology sector, 
									(with the exception of hardware engineer and technician) and to grow into other positions
									 with one or two years working experience.
								<\/li>
									Provide students with a sufficiently broad range of courses to enable them to be successful 
									in postgraduate programmes anywhere in the world.
								<\/li>
								<li>
									Employ a range of assessment methods and techniques and to enable students to demonstrate the 
									depth of their understanding and their capacity for independent thought.
								<\/li>
								<li>
									Give students support and guidance in what, for most students, is a new discipline.
								<\/li>
							<\/ul>',
			'degree_type_id'=>'2',
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