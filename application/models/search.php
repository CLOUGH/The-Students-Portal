<?php 
	class Search {

		public static function search_course($args)
		{
			if(count($args)==0)
			{
				$courses = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
						->get(array('courses.code','courses.title', 'courses.level',
							'courses.semester','faculties.name as faculty','courses.credit'));
				return $courses;
			}
		}
	}
?>