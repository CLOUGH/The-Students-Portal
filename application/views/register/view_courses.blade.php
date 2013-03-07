@layout('layouts.default')
@section('content')

<h4 class="page_heading">Registered Courses</h4>

<table class="table table-striped table-hover">
	<tr>
		<th>Code</th>
		<th>Title</th>
		<th>Faculty</th>
		<th>Credit</th>
		<th>Semester</th>
		<th>Level</th>

		<th>View Schedule</th>
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
			<td><a href="#" class="toggle_course_scehdule" id="{{$course->id}}"><i class="icon-chevron-down"></i></a></td>
			<td>{{HTML::link("#", "DROP", array("onclick"=>"alert();"))}}</td>
		</tr>
		<tr class="hidden-schedule-table" id="{{$course->id}}">
			<td></td>
			<td  colspan="7">
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

@endsection