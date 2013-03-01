<?php

class Add_Courses {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		
		DB::table('courses')->insert(array(
			'title'=>'Net-Centric',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2190',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'Net Centric computing covers a wide range of sub-specialities including: 
							computer communication network concepts andprotocols, mobile and wireless 
							computing, and distributed systems. The Net-Centric Computing course also 
							exposes students to important aspects of secure systems development including 
							cryptography, intrusion detection and malware detection. Finally, this course 
							will introduce students to Web technologies including: basic server-side and 
							client-side scripts.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Analysis of Algorithms',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2111',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'This is a core course in the BSc Computer Science curriculum. It is the updated 
							version of CS20A. Its primary focus is on the method of assessing time complexity 
							of an algorithm, and on several algorithms that efficiently solve common problems 
							across a wide range of domains. Hand in hand with the discussion of these algorithms, 
							goes a discussion of the data structures that support them. Therefore each topic in this 
							course is usually presented as a family of problems, the types of algorithmic solutions 
							available, the necessary data structures to support them, and analyses of the tradeoffs 
							involved with using each of these solutions.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));	
		DB::table('courses')->insert(array(
			'title'=>'Introduction to Electronics',
			'subject'=>'Electronics',
			'type'=>'theory',
			'code'=>'ElECT1400',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'1',
			'credit'=>'3',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Object Technology',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2170',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
	}


	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('courses')->where('code', '=', 'COMP2190')->delete();
		DB::table('courses')->where('code', '=', 'COMP2111')->delete();
		DB::table('courses')->where('code', '=', 'ElECT1400')->delete();
		DB::table('courses')->where('code', '=', 'COMP2170')->delete();
	}

}