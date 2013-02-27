@layout('layouts.default')

@section('content')
<h4 class="page_heading">Search Results</h4>
<table class="table table-striped table-hover table-bordered">
	<tr>
		<th>Code</th>
		<th>Title</th>
		<th>Faculty</th>
		<th>Credit</th>
		<th>Semester</th>
		<th>Level</th>
	</tr>
	@foreach($courses as $course)
		<tr>
			<td>{{$course->code}}</td>
			<td>{{$course->title}}</td>
			<td>{{$course->faculty}}</td>
			<td>{{$course->credit}}</td>
			<td>{{$course->semester}}</td>
			<td>{{$course->level}}</td>
		</tr>
	@endforeach
</table>
@endsection