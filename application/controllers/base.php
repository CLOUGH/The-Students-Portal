<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public $restful = true;
	public static $acitve_navigation = array(
		'dashboard'=>'inactive',
		'website'=>'active',
		'home'=>'inactive',
		'view_student_profile'=>'inactive',
		'student_advisory'=>'inactive',
		'register'=>'inactive',
		'academic_advisor'=>'inactive'
	);
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}
	public function make_active($key){
		$current_navigation = $this::$acitve_navigation;		
		unset($current_navigation['website']);
		$currently_active = array_search("active",$current_navigation);
		$this::$acitve_navigation[$currently_active] = "inactive";
		$this::$acitve_navigation[$key]="active";
	}

}