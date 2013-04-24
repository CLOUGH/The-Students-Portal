<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::filter('auth', function(){
	if (Auth::guest()) return Redirect::to_route('login');
});

Route::get('/', function()
{
	return View::make('home.index');
});

//Academic Advisor Routing
Route::get('academic_advisor/search_student', array('before'=>'auth','as'=>'search_student', 'uses'=>'academic_advisor@search_student'));
Route::get('academic_advisor/student_list', array('before'=>'auth','as'=>'student_list', 'uses'=>'academic_advisor@student_list'));
Route::post('academic_advisor/search_student', array('before'=>'auth','uses'=>'academic_advisor@search_student'));

//Courses Routing
Route::get('course/course_list/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', array('before'=>'auth','uses'=>'course@course_list'));
Route::get('course/comments/(:any)',array('before'=>'auth', 'as'=>'comments', 'uses'=>'comments@course_comments'));
Route::get('course/course_detail/(:any)',array('before'=>'auth', 'as'=>'course_detail', 'uses'=>'course@course_detail'));
Route::get('course/search_course', array('before'=>'auth','as'=>'search_course', 'uses'=>'course@course_search'));
Route::post('course/search_course', array('uses'=>'course@course_search'));
Route::get('course/academic_path', array('before'=>'auth','as'=>'academic_path', 'uses'=>'course@academic_path'));
Route::post('course/generate_path', array('before'=>'auth','as'=>'generate_path','uses'=>'course@generate_academic_path'));
Route::get('course/prerequisites/(:any)/(:any)', array('before'=>'auth', 'as'=>'prerequisites','uses'=>'course@course_prerequisites'));
Route::get('course/course_info/(:any)', array('before'=>'auth', 'as'=>'course_info','uses'=>'course@course_info'));


//Student Routes
Route::get('student/student_detail/(:any)',array('before'=>'auth', 'as'=>'student_detail', 'uses'=>'student@student_detail'));
Route::post('student/register_course', array('before'=>'auth', 'uses'=>'student@register_course'));
Route::get('student/view_courses', array('before'=>'auth','as'=>'view_registered_courses', 'uses'=>'student@view_courses'));
Route::get('register', array('before'=>'auth','as'=>'register', 'uses'=>'student@register'));
Route::get('student/drop',array('before'=>'auth','as'=>'drop_course', 'uses'=>'student@drop'));
Route::get('student/student_profile',array('before'=>'auth','as'=>'student_profile','uses'=>'student@student_profile'));


//Registering the user settings route
Route::get('user/view_setting', array('before'=>'auth', 'as'=>'view_setting', 'uses'=>'user@view_setting'));
Route::get('user/edit_setting', array('before'=>'auth', 'as'=>'edit_setting', 'uses'=>'user@edit_setting'));
Route::get('user/messages', array('before'=>'auth', 'as'=>'messages', 'uses'=>'user@messages'));
Route::get('user/send_messages', array('before'=>'auth', 'as'=>'send_messages', 'uses'=>'user@send_messages'));
Route::get('user/sent_messages', array('before'=>'auth', 'as'=>'sent_messages', 'uses'=>'user@sent_messages'));
Route::post('user/create_message', array('before'=>'auth', 'as'=>'create_message', 'uses'=>'user@create_message'));
Route::post('user/save_user_setting', array('before'=>'auth', 'uses'=>'user@save_user_setting'));



Route::get('overrides', array('before'=>'auth','as'=>'course_override', 'uses'=>'course@override'));
Route::get('home', array('before'=>'auth','as'=>"home", 'uses'=>'home@index'));
Route::get('/', array('before'=>'auth','as'=>"home", 'uses'=>'home@index'));
Route::get('login',array('as'=>'login', 'uses'=>'login@index'));
Route::post('login',array('uses'=>'login@login'));
Route::get('logout',array('as'=>'logout', 'uses'=>'login@logout'));

Route::get('authors',array('as'=>'authors', 'uses'=>'authors@index'));
Route::get('author/(:any)',array('as'=>'author', 'before'=>'auth', 'uses'=>'authors@view'));
Route::get('authors/new',array('as'=>'new_author', 'uses'=>'authors@new'));
Route::post('authors/create',array('uses'=>'authors@create'));
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});
// Event::listen('laravel.query', function($sql, $bindings, $time) {
// 	var_dump($sql);
// });
/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
