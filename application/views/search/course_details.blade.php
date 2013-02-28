@layout('layouts.default')

@section('content')
	<h4 class="page_heading">{{$course_detail->title}}</h4>
	<p>{{$course_detail->description}}</p>
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
	</table>
@endsection