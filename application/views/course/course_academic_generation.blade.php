@layout('layouts.default')

@section('content')

	<h4 class="page_heading">{{$title}}</h4>
	<h5>Description</h5>
	<p class="span8">
		An Academic Path is a method used by <strong><em>The Student Portal</em></strong> to help 
		students get a general idea of the courses needed to complete their degree. It allows the 
		student to see what are the courses they need to do for each semester and for each year.
		It factors in the students pass courses, course pre-requistes, the time avaliable to complete
		courses (if they have failed a core course, or required course), and modifies the Academic Path
		so that guides the student to his or her goals.
	</p>
	<br>
	{{Form::open('','POST',array('class' => "span8",'style'=>"margin-left:0px" ))}}
		<fieldset>
    		<legend>Generate Path</legend>

			{{Form::label('major','Major')}}
			{{Form::select('major', $degree_names)}}

			<p>
				{{Form::label('use_pre_req','Use Pre-Requistes')}}
				<span class="span1" style="margin-left: 0px">Yes </span>{{Form::radio('use_pre_req', 'Yes',true )}}
				<br>
				<span class="span1" style="margin-left: 0px">No </span>{{Form::radio('use_pre_req', 'No')}}
			</p>

			<p>
				{{Form::label('summer_school','Summer School')}}
				<span class="span1" style="margin-left: 0px">Yes </span>{{Form::radio('summer_school', 'Yes' )}}
				<br>
				<span class="span1" style="margin-left: 0px">No </span>{{Form::radio('summer_school', 'No',true )}}
			</p>

			{{Form::submit("Generate")}}
		</fieldset>
	{{Form::close();}}
@endsection