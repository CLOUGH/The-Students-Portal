<?php 
class Degree extends Eloquent
{
	public static function get_degrees()
	{
		$degrees= array();
		$i =0;
		foreach(Degree::all() as $degree)
		{
			if($degree->degree_type_id==1)
			{
				$degrees[$i++] = $degree;
			}
		}
		return $degrees;
	}
	public static function get_degree_names()
	{
		$degree_names = array();
		
		foreach(Degree::all() as $degree)
		{
			if($degree->degree_type_id==1)
			{
				$degree_names[$degree->id] = $degree->name;
			}
		}
		return $degree_names;
	}
	public function degree_courses()
	{
		return $this->has_many("DegreeCourse");
	}
}
?>