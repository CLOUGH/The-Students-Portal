<?php 
	class Authors_Controller extends Base_Controller{
		
		public $restful = true;

		public function get_index()
		{			
			return View::make('authors.index')
				->with('title', 'Authors and Books')
				->with('authors', Author::order_by('name')->get());
		}
		public function get_view($id)
		{
			return View::make('authors.view')
				->with('title', 'Author View Page')
				->with('author',Author::find($id));
		}
		public function get_new()
		{
			return View('authors.new')
				->with('title', 'Add New Author');
		}
		public function post_create()
		{
			$validation = Author::validate(Input::all());

			if($validation->fails())
			{	
				return Redirect::to_route('new_author')->with_errors($validation)->with_input();
				
			}else{
				Author::create(array(
					'name'=>Input::get('name'),
					'bio'=>Input::get('bio'),
					));
				return Redirect::to_route('authors')
					->with('message', 'The author was created successfully!');
			}
		}
	}
?>