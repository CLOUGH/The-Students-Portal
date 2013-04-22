<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	{{Asset::container('bootstrapper')->styles()}}
	{{Asset::container('bootstrapper')->scripts()}}

	{{HTML::script(URL::base().'/js/jquery.backstretch.min.js')}}
	{{HTML::script(URL::base().'/js/main.js')}}
	{{HTML::script(URL::base().'/js/jquery.transit.js')}}
	{{HTML::style(URL::base().'/css/stylesheet.css')}}
	{{HTML::script('js/rhinoslider-1.05.min.js')}}
	{{HTML::script('js/mousewheel.js')}}
	{{HTML::script('js/easing.js')}}

	<script>
		$(document).ready(function(){

			$("#admin-logout-icon").hover(function(){
				$(this).attr("class","icon-off icon-white");
			},function(){
				$(this).attr("class","icon-off");
			});
			$.backstretch("{{URL::base()}}/img/blurred-images.jpg");
			$('.dropdown-toggle').dropdown();
			$(".collapse").collapse();
			$("[data-toggle='tooltip']").tooltip();
		});
	</script>
</head>
<body>
	@if($user_type=="1")
    <nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-collapse pull-right">

						<ul class="nav">
							<li class="{{$active_navigation['website']}}">
								{{HTML::link_to_route('home', 'Website',array('role'=>'button'))}}
							</li>
							<li class="{{$active_navigation['dashboard']}}">
								{{HTML::link_to_route('home', 'Dashboard',array('role'=>'button'))}}
							</li>
							<li>
								<a href="{{URL::to_route('logout')}}">
								<i id="admin-logout-icon" class="icon-off"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	<style>#main-container{margin-top: 45px;}</style>
	@endif
	<div class="container" id="main-container">
		@if($active_navigation['website']=='active')
			<h1 class="application-heading" style="font-family:Rage Italic;color:#23750d;">The Student Portal</h1>
			<nav class="navbar">
			<div class="navbar-inner" id="main-navbar">
				<div class="container">
					<div class="nav-collapse pull-right">

						<ul class="nav">
							<li class="{{$active_navigation['home']}}" </li>
								{{HTML::link_to_route('home', 'Home',array('role'=>'button'))}}
							</li>
							@if(Auth::user()->type == '3' || Auth::user()->type =='1')
							<li class="dropdown {{$active_navigation['academic_advisor']}}">
								<a class="dropdown-toggle" data-toggle="dropdown"  role="button" href="#">Academic Consultation</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
									<li>{{HTML::link_to_route('search_student', 'Search for Student',array('tabindex'=>'-1' ))}}</li>
								</ul>
							</li>
							@endif
							@if(Auth::user()->type =='1'|| Auth::user()->type=='2')
								<li class="dropdown {{$active_navigation['view_student_profile']}}">
								<a class="dropdown-toggle" data-toggle="dropdown"  role="button" href="#">Profile Management</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
									<li>{{HTML::link_to_route('student_profile', 'View Student Profile',array('tabindex'=>'-1' ))}}</li>
								</ul>
							</li>								
							@endif
							
							<li class="dropdown {{$active_navigation['student_advisory']}} ?>">
								<a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Course Advisory</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" >
									<li>{{HTML::link_to_route('search_course', 'Search for Course',array('tabindex'=>'-1'))}}</li>
									<li>{{HTML::link_to_route('academic_path', 'Generate Academic Path',array('tabindex'=>'-1' ))}}</li>
								</ul>
							</li>
							@if(Auth::user()->type == '2' || Auth::user()->type =='1')
							<li class="dropdown {{$active_navigation['register']}} ?>">
								<a  class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Register</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
									<li>{{HTML::link_to_route('view_registered_courses', 'View Registered Courses',array('tabindex'=>'-1' ))}}</li>
									<li>{{HTML::link_to_route('register', 'Register for Course',array('tabindex'=>'-1' ))}}</li>
								</ul>
							</li>
							@endif
						</ul>
						<ul class="nav" id="user-nav">
							<li>
								<a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
									<span class="profile-icon-container"><i class="icon-user"></i></span>{{$user_first_name}}
								</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
									<li><a tabindex="-1" href="{{URL::to_route('messages')}}">Messages</a></li>
									<li><a tabindex="-1" href="{{URL::to_route('view_setting')}}">Manage Account</a></li>
									<li><a id="logout-link" tabindex="-1" href="{{URL::to_route('logout')}}">
											Logout
											<i class="icon-off"></i>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			</nav>
		@endif
	@if(URL::current()==URL::to_route("home"))	
		<div class="banner">
			{{HTML::style(URL::base().'/css/home.css')}}
			@yield('banner')
		</div>
	@endif
	<div class="main_contents">
	@yield('content')
	</div>
</div>
<div class="footer">
</div>
</body>
</html>