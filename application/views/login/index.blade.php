<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	{{Asset::container('bootstrapper')->styles()}}
	{{Asset::container('bootstrapper')->scripts()}}
	{{HTML::style('css/login-stylesheet.css')}}
	{{HTML::script('js/jquery.backstretch.min.js')}}
	{{HTML::script('js/rhinoslider-1.05.min.js')}}
	{{HTML::script('js/mousewheel.js')}}
	{{HTML::script('js/easing.js')}}
</head>
<body>
	<script>
		$(document).ready(function(){
			$.backstretch("img/login_bg.jpg");

            $('#slider').rhinoslider({
                showTime: 9000,
                controlsMousewheel: false,
                controlsKeyboard: false,
                controlsPrevNext: false,
                controlsPlayPause: false,
                autoPlay: true,
                pauseOnHover: true,
                showCaptions: 'always',
                showBullets: 'never',
                showControls: 'never'
            });
		});
	</script>

	<div class="container span7">	
		{{Form::open("login",'POST', array('class'=>'row'))}}
			<div class="span6">
				<h2>The Students Portal</h2>
				
				@if($errors->has() || Session::has('login_errors'))
					<div class="alert alert-error span5">
						{{$errors->first('username', ':message')}}	
						{{Session::has('login_errors')?"Username or password is incorrect.":''}}	
					</div>
				@endif
				
					<div class="row">
					<p class="span3 login-fields">
						{{Form::label("username", "Username");}}
						{{Form::text("username")}}
					</p>
					<p class="span3 login-fields">
						{{Form::label("password","Password")}}
						{{Form::password("password")}}
					</p>
					</div>
					{{Form::submit("Login")}}				
				</div>				
		{{Form::close()}}
		<div id="page">
            <ul id="slider">
                <li><img src="img/slider/slider1.png" alt="" /></li>
                <li><img src="img/slider/slider2.png" alt="" /></li>
            </ul>
        </div>
	</div>
</body>
</html>