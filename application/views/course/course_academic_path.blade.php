@layout('layouts.default')

@section('content')

	<h4 class="page_heading">{{$title}}</h4>

	<ul class="nav nav-pills academic_nav_stages">
		<li class="active" id="tab1">
			<a href="#1" data-toggle="tab" class="tab_link">Description</a>
		</li>
		@if($user_type!=2)
			<li id="tab2" class="disabled" >
				<a href="#2" data-toggle="tab" class="tab_link">Student Information</a>
			</li>
		@endif
		<li class="disabled" id="tab3">
			<a href="#3" data-toggle="tab" class="tab_link">Degree Information</a>
		</li>
		<li class="disabled" id="tab4">
			<a href="#4" data-toggle="tab" class="tab_link">Course Information</a>
		</li>
	</ul>
	{{Form::open(URL::to_route('generate_path'), 'POST')}}
	<div class="tab-content">
		
		<div id="1" class="academic_pages tab-pane active">
			<h5>Description</h5>
			<p id="description">
				An Academic Path is a method used by <strong><em>The Student Portal</em></strong> to help 
				students get a general idea of the courses needed to complete their degree. It allows the 
				student to see what are the courses they need to do for each semester and for each year.stu
				It factors in the students pass courses, course pre-requistes, the time avaliable to complete
				courses (if they have failed a core course, or required course), and modifies the Academic Path
				so that guides the student to his or her goals.
			</p>
			<br>
			<a href="#{{$user_type!=2?2:3}}" class="btn next">Start</a>
		</div>

		<div id="2" class="academic_pages tab-pane">
			<p>

			@if($user_type!=2)
				{{Form::label("student_id","Student ID")}}
				{{Form::text("student_id")}}
			@endif
			<br>
			<a href="#1" class="btn back">Back</a>
			<a href="#3" class="btn next">Next</a>
		</div>

		<div id ="3" class="academic_pages tab-pane">
			{{Form::label("degree_name", "Degree")}}
			{{Form::select("degree_name", $degree_names,array("onblur"=>"get_prerequisites_courses()"))}}
			
			<br>			
			<a href="#{{$user_type!=2?2:1}}" class="btn back">Back</a>
			<a href="#4" class="btn next">Next</a>
			<br>

			<div class="alert alert-block">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Warning!</h4>
				Best check yo self, you're not...
			</div>
		</div>	
		<div id="4" class="academic_pages tab-pane">
			<p>Courses have several pre-requisites which are needed before you can register for a course.
				To generate a <strong><em>Academic Path</em></strong> we need you to select which one of
				the prerequisites you would like to use in your <strong><em>Academic Path</em></strong>.
			</p>
			<br>
			<br>
			<table class="table table-condensed" id="course_prereq_tbl" style="font-size: 11px;">
				<tr>
					<th>Code</th>
					<th>Title</th>
					<th>Faculty</th>
					<th>Credit</th>
					<th>Semester</th>
					<th>Level</th>
					<th>View </th>
				</tr>
			</table>
			<a href="#3" class="btn back">Back</a>
		</div>
	</div>
	{{Form::close()}}

	

@endsection
<script type="text/javascript">
function get_prerequisites_courses()
{
	var degree_name = $('[name=degree_name]').text();
	@if($user_type !=2)
		var student_id  = $('[name=student_id]').text();
	@else
		var student_id = '';
	@endif
	alert("{{URL::to_route('prerequisites')}}");
	$.get("{{URL::to_route('prerequisites')}}/"+degree_name+"/"+student_id, function(data)
	{

	});
	
}
/*
$.get(""+$('[name=degree_name]').text(),function(data)
	{
		var JSONObject = data;
		$.each(JSONObject['core_courses'],function(index,value){
			
			console.log(value[6].length==0);
			if(value[6].length!=0)
			{
				var row = 	"<tr>"
								+"<td><a href='{{URL::base()}}/course/course_detail/"+value[1]+"'>"+value[7]+"</a></td>"
								+"<td>"+value[0]+"</td>"
								+"<td>"+value[5]+"</td>"
								+"<td>"+value[4]+"</td>"
								+"<td>"+value[2]+"</td>"
								+"<td>"+value[3]+"</td>"
								+"<td><a class='toggle_course_pre_req' id='"+value[1]+"''><i class='icon-chevron-down'></i></a></td>"
							+"</tr>";
				$("#course_prereq_tbl").append(row);
				row = 	"<tr class='hidden-pre_req-table' id='"+value[1]+"'>"+
							"<td></td>"+
							"<td  colspan='6'>"+
							"<table class='table table-condensed schedule_table'>"+
								"<tr>"+
									"<td>"+value[6][0][6]+"</td>"+
									"<td>"+value[6][0][0]+"</td>"+
								"</tr>"+

							"</table>";
				$("#course_prereq_tbl").append(row);
			}
			
		});
	});
*/
</script>