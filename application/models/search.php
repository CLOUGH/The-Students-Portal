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
		public static function search_student($args)
		{
			if(count($args)==0)
				return Student::with('user','student.faculty','student.studenttype')->where('user_id','=','2')->get();
			else{

				$user = array('user'=>function($query) use ($args){
					$query->where('first_name','LIKE',"%$args[first_name]%");
				});
				$students = DB::table('students')->join('faculties','students.faculty_id','=','faculties.id')
						->join('users','students.user_id','=','users.id')
						->join('student_types','students.student_type_id','=','student_types.id')
						->where('student_id','LIKE',"%$args[student_id]%")
						->where('users.first_name','LIKE',"%$args[first_name]%")
						->where('users.last_name','LIKE',"%$args[last_name]%");
				if($args['faculty']!='all')
					$students->where('faculties.id','=',"$args[faculty]");
				if($args['student_type']!='all')
					$students->where('student_types.id','=',"$args[student_type]");							
				
				return $students->get(array('students.id','students.student_id','users.first_name','users.last_name',
						'faculties.name as faculty','student_types.name as student_type','users.email') );
			}	
		}
		public static function encode_url($var)
		{
			return urlencode(base64_encode($var.'~'));
		}
		public static function decode_url($url)
		{
			return substr(base64_decode($url),0, strrpos(base64_decode($url),'~',-1) );
		}
		

	}
?>