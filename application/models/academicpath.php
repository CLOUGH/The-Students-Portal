<?php 
class AcademicPath extends Eloquent{
	public static $table = "academic_paths";

	public static function generate_academic_path($args)
	{

		//Set up the basic settings of the academic path
		$academic_path = new AcademicPath;
		$academic_path->name = $args['name'];
		$academic_path->student_id = $args["student"]->id;
		$academic_path->degree_id = $args["degree_id"];
		$academic_path->description = $args["description"];
		$academic_path->save();

	
		//Find courses that belong to a degree
		$academic_path_courses = array();
		$i=0;
		foreach($academic_path->degree->degree_courses as $degree_course)
		{
			$academic_path_courses[$i] = new AcademicPathCourse; 
			$academic_path_courses[$i]->course_id = $degree_course->course_id;
			$academic_path_courses[$i]->academic_path_id =$academic_path->id;
			$academic_path_courses[$i]->academic_path_type_id = 1; //1=>coure_course and 2=>free_electives

			

			//Determine now which year the course should be schedule for
			// to do this determine first the current year and the level of the course
			$current_year = intval(date('Y'));
			$current_month =  intval(date('n'));
			$semester = intval($degree_course->course->semester);
			$level = intval($degree_course->course->level);
			
			if($current_month<=3 || $current_month>10)	//if current year is second semester
			{
				if($semester==2)
					$academic_path_courses[$i]->year = $args['generate_for_current']=='y'? $current_year+$level: $current_year+$level+1;
				else
					$academic_path_courses[$i]->year =$args['generate_for_current']=='y'? $current_year+$level-1 : $current_year+$level;				
			}
			elseif( $current_month<=10)  //if current month is in the first semester
			{
				if($semester==1)
					$academic_path_courses[$i]->year =$args['generate_for_current']=='y'? $current_year+$level-1 : $current_year+$level;	
				else
					$academic_path_courses[$i]->year =$args['generate_for_current']=='y'? $current_year+$level : $current_year+$level+1;	
			}
			// elseif ($current_month>5 && $current_month<9) 
			// {
			// 	TODO: figure out how to include summer school in the application 
			// 	hint: course offerings
			// 	$current_semester =3;
			// }
			
			$i++;
		}
		exit;
		return $academic_path;
	}
	private function get_prequisites($course,$student)
	{
		if($course->level >0)
		{
			if(is_null($course->pre_requisites))
			{
				return array(date('Y'),$course->id,$course->level);
			}
			else{

			}
			
		}
		else
		{
			return ;
		}
	}
	public function degree()
	{
		return $this->belongs_to("Degree");
	}
}
?>