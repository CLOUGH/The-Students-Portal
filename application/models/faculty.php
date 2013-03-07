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
	public function student()
	{
		return $this->has_many('Student');
	}
	public function course()
	{
		return $this->has_many('Course');
	}
}
?>