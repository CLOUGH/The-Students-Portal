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
			</tr>
		@foreach($student->courses()->get() as $course)
			<tr class="search_list_row" onclick="redirect('{{URL::to_route('course_detail').'/'.$course->id}}')">
				<td>{{$course->code}}</td>
				<td>{{$course->title}}</td>
				<td>{{$course->faculty->first()->name}}</td>
				<td>{{$course->credit}}</td>
				<td>{{$course->semester}}</td>
				<td>{{$course->level}}</td>
			</tr>
		@endforeach	
		</table>
	</div>
 	<div class="tab-pane" id="transcript">
 	</div>
  	<div class="tab-pane" id="academic_path">
  	</div>
</div>

@endsection