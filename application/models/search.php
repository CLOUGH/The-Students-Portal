<?php 
	class Search {

		public static function search_course($args,$is_detailed_search)
		{
			if(count($args)==0)
			{
				$courses = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
						->get(array('courses.id','courses.code','courses.title', 'courses.level',
							'courses.semester','faculties.name as faculty','courses.credit'));
				return $courses;
			}else if(!$is_detailed_search)
			{
				
				$sql = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
						->where('title', 'LIKE',"%$args[course_name]%")
						->where('code', 'LIKE', "%$args[course_code]%")
						->where('subject', 'LIKE', "%$args[subject]%");
				if($args['level']!='all')
					$sql= $sql->where('level', '=',"$args[level]");
				if($args['credit_range_min']!='')
					$sql = $sql->where('credit','>',"$args[credit_range_min]");
				if($args['credit_range_max']!='')
					$sql = $sql->where('credit','<',"$args[credit_range_max]");
				if($args['semester']!='all')
					$sql = $sql->where('semester','=',"$args[semester]");

				$courses = $sql->get(array('courses.id','courses.code','courses.title', 'courses.level',
							'courses.semester','faculties.name as faculty','courses.credit'));
				return $courses;
			}
		}
		

	}
?>