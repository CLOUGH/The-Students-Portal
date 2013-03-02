@layout('layouts.default')

@section('content')
	<h4 class="page_heading">{{$course_detail->title}}</h4>
	<p id="course_description">{{$course_detail->description}}</p>
	
	<h5>Prerequisites</h5>
	<ul>
		@if(count($pre_requisites)>0)			
			@foreach($pre_requisites as $pre_requisite)
				<li>{{HTML::link(URL::to_route('course_detail').'/'.$pre_requisite->course_id, $pre_requisite->code,array('data-toggle'=>'tooltip','title'=>"$pre_requisite->title"))}}</li>
			@endforeach
		@else
				<li>None</li>
		@endif
	</ul>
	<h5>Registration Requirements</h5>
	
	@if(isset($registration_requirement))
		<ul>
			@if($registration_requirement->lectures>0)
				<li>{{$registration_requirement->lectures}} Lectures</li>
			@endif
			@if($registration_requirement->tutorials>0)
				<li>{{$registration_requirement->tutorials}} Tutorials</li>
			@endif
			@if($registration_requirement->labs>0)
				<li>{{$registration_requirement->labs}} Labs</li>
			@endif
			@if($registration_requirement->seminar>0)
				<li>{{$registration_requirement->seminar}} Seminars</li>
			@endif		
		</ul>
	@endif
	
	<h5>Schedules</h5>
	<table class="table table-striped table-hover">
		<tr>
			<th>Type</th>
			<th>Time</th>
			<th>Day</th>
			<th>Room</th>
			<th>Lecturers</th>
			<th>Register</th>
		</tr>
		@if(count($schedules)>0)			
			@foreach($schedules as $schedule)
					<tr>
						<td>{{$schedule->type}}</td>
						<td>{{$schedule->start_time.' - '.$schedule->end_time}}</td>
						<td>{{$schedule->day}}</td>
						<td ><span data-toggle='tooltip' title="{{$schedule->room_name}}">{{$schedule->room_initial}}</span></td>
						<td>Lecturers</td>
						<td>{{Form::checkbox('register')}}</td>
					</tr>
			@endforeach
		@else
			<tr>
				<td colspan="6">Empty</td>
			</tr>
		@endif
	</table>
@endsection