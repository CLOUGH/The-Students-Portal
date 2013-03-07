@layout('layouts.default')

@section('content')
	<h4 class="page_heading">Search Results</h4>
	<table class="table table-striped table-hover table-bordered">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Faculty</th>
			<th>Type</th>
			<th>Email</th>
		</tr>
		@if(count($students)!=0)
			@foreach($students as $student)
				<tr class="search_list_row" onclick="redirect('{{URL::to_route('student_detail').'/'.$student->id}}')">
					<td>{{$student->student_id}}</td>
					<td>{{$student->first_name." ".$student->last_name}}</td>
					<td>{{$student->faculty}}</td>
					<td>{{$student->student_type}}</td>
					<td>{{$student->email}}</td>
				</tr>
			@endforeach
		@endif
	</table>
@endsection