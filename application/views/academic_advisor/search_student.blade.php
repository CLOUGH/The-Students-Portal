@layout('layouts.default')

@section('content')
<h4 class="page_heading">Search for Student</h4>
	{{Form::open("academic_advisor/search_student",'POST',array('id'=>'search_student_form'))}}
		
		<div class="row-fluid ">
			<div class="span6">
				{{Form::label("student_id", "ID#")}}
				{{Form::text("student_id")}}
			</div>
			<div class="row-fluid">
			<div class="span12">
				<div class="span6">
					{{Form::label("first_name", "First Name")}}
					{{Form::text("first_name")}}
					
					{{Form::label("faculty", "Faculty")}}
					{{Form::select("faculty",$faculties)}}

					{{Form::label("level","Level of Student")}}
					{{Form::select("level", array('all'=>'All','1'=>'1st','2'=>'2nd','3'=>'3rd','4'=>'4th','5'=>'5th'))}}
				</div>
				<div class="span6">

					{{Form::label("last_name", "Last Name")}}
					{{Form::text("last_name")}}


					{{Form::label("degree", "Degree Type")}}
					{{Form::text("degree")}}

					{{Form::label("full_time","Type of Student")}}
					{{Form::select("full_time", array('all'=>'All','1'=>'Full Time','2'=>'Part Time'))}}
					<br>
				</div>
			</div>
			</div>
		</div>
		{{Form::submit("Search",array('class'=>'submit'))}}
	{{Form::close()}}
@endsection