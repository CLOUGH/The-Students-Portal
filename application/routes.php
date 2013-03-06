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
Route::get('student_profile', array('before'=>'auth','as'=>'student_profile', 'uses'=>'student@transcript'));

//Academic Advisor Routing
Route::get('academic_advisor/search_student', array('before'=>'auth','as'=>'search_student', 'uses'=>'academic_advisor@search_student'));
Route::get('academic_advisor/student_list', array('before'=>'auth','as'=>'student_list', 'uses'=>'academic_advisor@student_list'));
Route::post('academic_advisor/search_student', array('before'=>'auth','uses'=>'academic_advisor@search_student'));


//Search Routing
Route::get('search/search_course', array('before'=>'auth','as'=>'search_course', 'uses'=>'search@course_search'));
Route::post('search/search_course', array('uses'=>'search@course_search'));

//Courses Routing
Route::get('search/course_list/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', array('before'=>'auth','uses'=>'search@course_list'));
Route::get('course/comments/(:any)',array('before'=>'auth', 'as'=>'comments', 'uses'=>'comments@course_comments'));
Route::get('course/course_detail/(:any)',array('before'=>'auth', 'as'=>'course_detail', 'uses'=>'course@course_detail'));

Route::get('academic_path', array('before'=>'auth','as'=>'generate_path', 'uses'=>'course@generate'));
Route::get('register', array('before'=>'auth','as'=>'register', 'uses'=>'course@register'));
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