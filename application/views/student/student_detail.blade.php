@layout('layouts.default')
@section('content')

<h4 class="page_heading">{{$student->user->first_name.' '.$student->user->last_name}}</h4>
<ul class="nav nav-tabs">
	<li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
	<li><a href="#registered_courses" data-toggle="tab">Registered Courses</a></li>
	<li><a href="#transcript" data-toggle="tab">Transcript</a></li>
	<li><a href="#academic_path" data-toggle="tab">Academic Paths</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="overview">
		<p><span class='span2'>First Name:</span> {{$student->user->first_name}}</p>
		<p><span class='span2'>Last Name:</span> {{$student->user->last_name}}</p>
		<p><span class='span2'>Student ID#:</span> {{$student->student_id}}</p>
		<p><span class='span2'>Email:</span> {{$student->user->email}}</p>
		<p><span class='span2'>Faculty:</span> {{$student->faculty->name}}</p>
		<p><span class='span2'>Student Type:</span> {{$student->student_type->name}}</p>
		<p><span class='span2'>Hall:</span> {{$student->associated_hall}}</p>

	</div>
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
 	<div class="tab-pane" id="transcript">
	 	<div  style="text-align: center;">
	 		<p><h2>Student ID#:{{$student->student_id}}</h2></p>
		 	<p><h2>Name: {{$student->user->first_name}} {{$student->user->last_name}}</h2></p>
			
			<p><h3>Email:{{$student->user->email}}</h3></p>
			<p><h3>Faculty:{{$student->faculty->name}}</h3></p>
			<p><h3>Major:{{$student->major}}</h3></p>
			<p><h3>Student Type: {{$student->student_type->name}}</h3></p>
			<p><h3>Hall:{{$student->associated_hall}}</h3></p>
		</div>
		<h2>Registered Courses:</h2>
		<div>
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
		</div>
 	</div>
  	<div class="tab-pane" id="academic_path">
  	</div>
</div>

@endsection