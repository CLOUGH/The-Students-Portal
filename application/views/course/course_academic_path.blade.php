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
			<a href="#4" data-toggle="tab" class="tab_link">Finish</a>
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
			<a href="#{{$user_type!=2?2:3}}" class="btn next" {{$user_type!=2?'':"onclick='get_prerequisites_courses()'"}}>Start</a>
		</div>

		<div id="2" class="academic_pages tab-pane">
			<p>

			@if($user_type!=2)
				{{Form::label("student_id","Student ID")}}
				{{Form::text("student_id")}}
			@endif
			<br>
			<a href="#1" class="btn back">Back</a>
			<a href="#3" class="btn next" {{$user_type!=2?"onclick='get_prerequisites_courses()'":''}}>Next</a>
		</div>

		<div id ="3" class="academic_pages tab-pane">
			{{Form::label("degree_name", "Degree")}}
			{{Form::select("degree_name", $degree_names,'',array("onchange"=>"get_prerequisites_courses()"))}}
			

			<div class="alert alert-block" id="academic-path-warning">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Warning!</h4>
				<p>You have not met the pre-requisite for some of the courses belonging to this degree.
					If you still wish to continue generating a academic path any required course will be a preliminary
					course. This will result in you being a year behind with that course.Below is a list of preliminary courses that you must select to include in the <em><strong>
					Academic Path</strong></em>.
				</p>
			</div>

			<div id="required_course_list">
				<div class="required_courses" id="required_course_prototype">
					<p class="required_course_title"></p>
				</div>
			</div>

			<br>			
			<a href="#{{$user_type!=2?2:1}}" class="btn back">Back</a>
			<a href="#4" class="btn next">Next</a>
			<br>
		</div>	
		<div id="4" class="academic_pages tab-pane">
			<p style="text-align: center;font-size:16px">
				<strong>Thats all!</strong>
				 <br>
				Now we will generate your academic path.
			</p>
			<br>
			<br>
			
			<a href="#3" class="btn back">Back</a>
			<a href="#" class="btn next">Finish</a>
		</div>
	</div>
	{{Form::close()}}

	

@endsection
<script type="text/javascript">


function get_prerequisites_courses()
{

	var degree_name = $('[name=degree_name]').text();
	var student_id = 'null';
	@if($user_type !=2)
		if( $('[name=student_id]').val()!="")
			student_id  = $('[name=student_id]').val();
	@endif
	$.ajax({
		type: "GET",
		url: "{{URL::to_route('prerequisites')}}/"+degree_name+"/"+student_id+"/",
		data: {},
		dataType: 'json',
		async: false,
		success: function(data)
		{
			console.log(data);
			var errors = data.errors;
			var course = data.course_list;
			if(errors.student_not_found || errors.degree_not_found)
			{
				alert("error found");
			}
			else
			{	
				$.each(course,function(index,value){
					//Test if the 
					if(value.is_requirement_met==false && value.required_courses.length>0)
					{
						$("#academic-path-warning").css("display","block");
						var req_course_element  = $("#required_course_prototype").clone()
						req_course_element.attr('id',index);
						$.ajax({
							type: "GET",
							url: "{{URL::to_route('course_info')}}/"+value.course_id, 
							data: {},
							dataType: 'json',
							async: false,
							success: function(course_info)
							{
								var course_detail_route = "{{URL::to_route('course_detail')}}";
								req_course_element.find(".required_course_title:first-child").append(
									"<a href='"+course_detail_route+"/"+course_info.id+"'>"+course_info.title+
									"</a>");
							}});
						for(var i=0;i<value.required_courses.length;i++)
						{
							$.ajax({
							type: "GET",
							url: "{{URL::to_route('course_info')}}/"+value.required_courses[i],
							data: {},
							dataType: 'json',
							async: false,
							success: function(course_info)
							{
								req_course_element.append(
									"<label>"+course_info.title+"</label>");
								req_course_element.append(
									"<input type=radio name='required_courses_for"+value.course_id+"' value='"+course_info.id+"'>");
								
								console.log(course_info);
							}});
						}
						
						req_course_element.css('display',"block");

						$("#required_course_list").append(req_course_element);
					}
				});
			}
		}
		});
	
}

</script>