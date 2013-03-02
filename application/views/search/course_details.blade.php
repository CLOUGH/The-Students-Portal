@layout('layouts.default')

@section('content')
	<h4 class="page_heading">{{$course_detail->title}}</h4>
	<p id="course_description">{{$course_detail->description}}</p>
	
	<div class="row-fluid">
		<div class="span3">
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
		</div>
		<div class="span3">
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
		</div>		
	</div>

	<h5 id="schedule-heading">Schedules</h5>
	<table class="table table-striped">
		<tr>
			<th>Type</th>
			<th>Time</th>
			<th>Day</th>
			<th>Room</th>
			<th>Lecturers</th>
			<th class="register-column">Register</th>
		</tr>
		@if(count($schedules)>0)			
			@foreach($schedules as $schedule)
					<tr>
						<td>{{$schedule->type}}</td>
						<td>{{Search::army_to_normal_time($schedule->start_time).' - '.Search::army_to_normal_time($schedule->end_time)}}</td>
						<td>{{$schedule->day}}</td>
						<td ><span data-toggle='tooltip' title="{{$schedule->room_name}}">{{$schedule->room_initial}}</span></td>
						<td>Lecturers</td>
						<td class="register-column">{{Form::checkbox('register')}}</td>
					</tr>
			@endforeach
			<tr>
				<td colspan="5"></td>
				<td class="register-column">
					<button class="btn btn-small btn-inverse " type="button" >Register</button>
				</td>
			</tr>
		@else
			<tr>
				<td colspan="6">Empty</td>
			</tr>
		@endif
	</table>

	<br>
	<h5 id="comment-heading">Comments</h5>
	<div class="comments row-fluid">
		<div class="span1">
			<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTwX6mBBzy0Wqnk2xFVTGNWwEYUSYsya0xmSG42GXF0ZSmGIdOI" class="img-rounded">
		</div>
		<div class="span8">
		<p class="comment_header">
			<span class="author">Firstname Last Name</span> said
			<span class="comment-date">Date</span>
		</p>
		<p class="comment-text">
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
			euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
			minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
			aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor i
		</p>
		</div>
	</div>
	<div class="comments row-fluid">
		<div class="span1">
			<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTwX6mBBzy0Wqnk2xFVTGNWwEYUSYsya0xmSG42GXF0ZSmGIdOI" class="img-rounded">
		</div>
		<div class="span8">
		<p class="comment_header">
			<span class="author">Firstname Last Name</span> said
			<span class="comment-date">Date</span>
		</p>
		<p class="comment-text">
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
			euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
			minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
			aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor i
		</p>
		</div>
	</div>
@endsection