<?php 
class Faculty extends Eloquent{
	public static $table ="faculties";

	public static function get_dropdown(){
		
			$faculty_list= array("all"=>"All");
			foreach(Faculty::order_by('name')->get() as $faculty){
				$faculty_list[$faculty->id] = $faculty->name;
			}	
			return $faculty_list;			
	}
}
?>