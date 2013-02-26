<?php 
class Search_Controller extends Base_Controller
{
	public $restful = true;
	private $acitve_navigation = array(
		'dashboard'=>'inactive',
		'website'=>'active',
		'home'=>'inactive',
		'view_student_profile'=>'inactive',
		'student_advisory'=>'active',
		'register'=>'inactive',
	);
	public function get_course_search(){
		
		$this->make_active("student_advisory");		
		return View::make("search.course_search")
			->with('title','Search Course')
			->with('active_navigation',$this->acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('news_list', News::order_by('updated_at')->get())
			->with('faculties', Faculty::get_dropdown());
	}
	public function post_course_search()
	{
		return Redirect::to_route("course_list");
	}
	public function get_course_list()
	{
		$this->make_active("student_advisory");
		return View::make("search.course_list")
			->with('title','Search Result')
			->with('active_navigation',$this->acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name);
	}
	private function make_active($key){

		$current_navigation = $this->acitve_navigation;
		
		unset($current_navigation['website']);
		$currently_active = array_search("active",$current_navigation);
		$this->acitve_navigation[$currently_active] = "inactive";
		$this->acitve_navigation[$key]="active";
	}
	
}
?>