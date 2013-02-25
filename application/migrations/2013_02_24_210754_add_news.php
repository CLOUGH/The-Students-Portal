<?php

class Add_News {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('news')->insert(array(
				'id'=>'1',
				'title'=> "US forces 'must leave' Afghan region",
				'body'=> "The Afghan president has ordered US special forces to leave Wardak
						province within two weeks. The decision was being taken due to allegations
						 of disappearances and torture by Afghans considered to be part of US special
						 forces, said a spokesman for Hamid Karzai.The strategically significant, 
						 central province of Wardak has been the recent focus of counter-insurgency 
						 operations.A US statement said it took all allegations of misconduct seriously.",
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('news')->insert(array(
				'id'=>'2',
				'title'=> "Oscars: Hollywood prepares for Academy Awards",
				'body'=> "ollywood is gearing up for what is likely to be one of the most unpredictable Academy
				 		Awards for years.Hundreds of fans and members of the world's media are in place on the 
				 		red carpet and there is tight security outside the Dolby Theatre.The ceremony is due to
				 		 start at 17:30 Los Angeles time (01:30 GMT).No film is expected to sweep the board, and 
				 		 hostage drama Argo has overtaken historical epic Lincoln in most predictions for the best 
				 		 picture prize.Daniel Day-Lewis, who plays Abraham Lincoln, is favourite for best actor, 
				 		 while Les Miserables star Anne Hathaway is tipped for supporting actress.But the other acting 
				 		 categories are more open.",
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('news')->insert(array(
				'id'=>'3',
				'title'=> "How do you count Catholics?",
				'body'=> "As Pope Benedict XVI prepares to step down next week, speculation is intensifying as to who will
						lead the reported 1.2 billion Catholics worldwide. But how did the Vatican arrive at that figure?The 
						figure of 1.2 billion, in theory, represents the number of people who have been baptised into the 
						Catholic faith.This might seem like an easy figure to calculate. Many people assume that when someone 
						is baptised this is recorded and passed on to the Vatican.But religious organisations vary in how much 
						importance they attach to keeping good statistics, according to David Voas, professor of population 
						studies at the University of Essex's institute of social and economic research.",
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
		DB::table('news')->where('id', '=', '1')->delete();
		DB::table('news')->where('id', '=', '2')->delete();
		DB::table('news')->where('id', '=', '3')->delete();
	}

}