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

	<h5>Schedules</h5>
	<table class="table table-striped table-hover">
		<tr>
			<td>Type</td>
			<td>Time</td>
			<td>Day</td>
			<td>Room</td>
			<td>Lecturers</td>
			<td>Register</td>
		</tr>
		@if(count($schedules)>0)			
			@foreach($schedules as $schedule)
					<tr>
						<td>{{$schedule->type}}</td>
						<td>{{$schedule->start_time.' - '.$schedule->end_time}}</td>
						<td>{{$schedule->day}}</td>
						<td data-toggle='tooltip' title="{{$schedule->room_name}}">{{$schedule->room_initial}}</td>
						<td>Lecturers</td>
						<td>{{Form::checkbox('register')}}</td>
					</tr>
			@endforeach
		@else
			<tr colspan="6">
				<td>Empty</td>
			</tr>
		@endif
	</table>
@endsection