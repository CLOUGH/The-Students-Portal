<?php 
	class Search {
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

	}
?>