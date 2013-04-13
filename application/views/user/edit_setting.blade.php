@layout('layouts.default')
@section('content')
<h4 class="page_heading">User Settings</h4>

@if($errors->has())
	<div class="alert alert-error">
		{{$errors->first('first_name', '<li>:message</li>')}}	
		{{$errors->first('last_name', '<li>:message</li>')}}
	</div>
@endif

{{Form::open("user/save_user_setting","POST")}}
	{{Form::label("user_name", "User Name")}}
	{{Form::text("user_name",$user->username,array("disabled"))}}

	{{Form::label("email","Email")}}
	{{Form::text("email",$user->email,array("disabled"))}}

	{{Form::label("first_name", "First Name")}}
	{{Form::text("first_name",$user->first_name)}}

	{{Form::label("last_name","Last Name")}}
	{{Form::text("last_name",$user->last_name)}}


	<div class="accordion-heading">
		<a class="accordion-toggle" data-toggle="collapse" href="#passwordFields">
    		Change Password
    		<i class="icon-chevron-down" id="detail-search-dropdown-icon"></i>
  		</a>
	</div>
	<div id="passwordFields" class="accordion-body collapse in">
		{{Form::label("old_password", "Old Password")}}
		{{Form::password("old_password")}}

		{{Form::label("new_password", "New Password")}}
		{{Form::password("new_password")}}

		{{Form::label("confirm_password", "Confirm Password")}}
		{{Form::password("confirm_password")}}
	</div>

	{{Form::submit("Save")}}
{{Form::close()}}
@endsection