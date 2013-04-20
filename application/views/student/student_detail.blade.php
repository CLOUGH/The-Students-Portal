@layout('layouts.default')
@section('content')
<h4 class="page_heading">{{$student->user->first_name.' '.$student->user->last_name}}</h4>
<ul class="nav nav-tabs">
	<li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
	@if($user_type!="2")
		<li><a href="#registered_courses" data-toggle="tab">Registered Courses</a></li>
	@endif
	<li><a href="#transcript" data-toggle="tab">Transcript</a></li>
	<li><a href="#academic_path" data-toggle="tab">Academic Paths</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="overview">
		<p><span class='span2'>First Name:</span> {{$student->user->first_name}}</p>
		<p><span class='span2'>Last Name:</span> {{$student->user->last_name}}</p>
		<p><span class='span2'>Student ID#:</span> {{$student->student_id}}</p>
		<p><span class='span2'>Course Level:</span> </strong>{{$student->level_type->name}}</p>
		<p><span class='span2'>Email:</span> {{$student->user->email}}</p>
		<p><span class='span2'>Faculty:</span> {{$student->faculty->name}}</p>
		<p><span class='span2'>Student Type:</span> {{$student->student_type->name}}</p>
		<p><span class='span2'>Hall:</span> {{$student->associated_hall}}</p>
	</div>
	@if($user_type!="2")
		<div class="tab-pane" id="registered_courses">
			<table class="table table-striped table-hover">
				<tr>
					<th>Code</th>
					<th>Title</th>
					<th>Faculty</th>
					<th>Credit</th>
					<th>Semester</th>
					<th>Level</th>
					<th></th>
				</tr>
			@foreach($student->courses()->get() as $course)
				<tr>
					<td>{{HTML::link(URL::to_route('course_detail').'/'.$course->id, $course->code)}}</td>
					<td>{{$course->title}}</td>
					<td>{{$course->faculty->first()->name}}</td>
					<td>{{$course->credit}}</td>
					<td>{{$course->semester}}</td>
					<td>{{$course->level}}</td>
					<td><a href="#" class="toggle_course_scehdule" id="{{$course->id}}">Show Schedule </a></td>
				</tr>
				<tr class="hidden-schedule-table" id="{{$course->id}}">
					<td></td>
					<td  colspan="6">
					<table class="table table-condensed schedule_table">
					@foreach($student->schedules as $schedule)
						@if($course->id == $schedule->course->id)
							<tr>
								<td>{{$schedule->type->first()->name}}</td>
								<td>{{Course::army_to_normal_time($schedule->start_time).' - '.Course::army_to_normal_time($schedule->end_time)}}</td>
								<td>{{$schedule->day}}</td>
								<td ><span data-toggle='tooltip' title="{{$schedule->room->name}}">{{$schedule->room->initials}}</span></td>
								<td>Lecturers</td>
							</tr>
						@endif
					@endforeach

					</table>
					</td>
				</tr>
			@endforeach	
				
			</table>
		</div>
	@endif
 	<div class="tab-pane" id="transcript">
	 	<h3>Transcript of Academic Record</h3>
	 	<p>
	 		<span class="span4 align-left" style="margin:0px">
	 		<strong>Record of: </strong>{{$student->user->first_name.' '.$student->user->last_name}}
	 		</span>
	 		<strong>Student ID:</strong> {{$student->student_id}}
	 	</p>
	 	<p>
	 		<strong>Course Level: </strong>{{$student->level_type->name}}
	 	</p>
	 	<br>
	 	@foreach($student->get_completed_courses_by_semester() as $key=> $semester_completed_courses)
	 		<div class="semester_detail span11" style="margin-left: 0px;">
		 		
		 		<p class="semester_title"><strong>
		 			{{Student::parse_semester_key($key)}}
		 		</strong></p>

		 		<p class="span7"><strong>Academic Standing:</strong>
		 			<br>
		 			<strong>Term GPA: {{Student::calc_gpa($semester_completed_courses)}}</strong>
		 		</p>

			 	<table class="table span7 table-condensed table-bordered">
			 		<tr>
			 			<th>Course Title</th>
			 			<th>Credit</th>
			 			<th>Grade</th>
			 			<th>Points</th>
			 		</tr>
			 		@foreach($semester_completed_courses as $completed_course)
				 		<tr>
				 			<td class="span4">{{$completed_course->course->title}}</td>
				 			<td>{{$completed_course->course->credit}}</td>
				 			<td>{{$completed_course->grade}}</td>
				 			<td>{{Student::points(array($completed_course))}}</td>
				 		</tr>
			 		@endforeach
			 	</table>
			 	<table class="table table-condensed span8">
			 		<tr>
			 			<td></td>
						<th>Passed Hours</th>
						<th>Attempted Hours</th>
						<th>GPA Hours</th>
						<th>Quality Points</th>
						<th>GPA</th>
					</tr>
					<tr>
						<th>Current Term</th>
						<td>{{Student::hours($semester_completed_courses)}}</td>
						<td>{{Student::hours($semester_completed_courses)}}</td>
						<td>{{Student::hours($semester_completed_courses)}}</td>
						<td>{{Student::points($semester_completed_courses)}}</td>
						<td>{{Student::calc_gpa($semester_completed_courses)}}</td>
					</tr>
					<tr>
						<th>Cumulative</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
			 	</table>
		 	</div>
	 	@endforeach
 	</div>
  	<div class="tab-pane" id="academic_path">
  	</div>
</div>

@endsection