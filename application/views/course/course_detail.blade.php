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
	{{Form::open('student/register_course')}}
	@if(Session::has("registration_errors") )
		<div class="alert alert-error" style="margin-left: 0px">
			{{Session::get('registration_errors')}}	
		</div>
		{{Session::forget('registration_errors')}}
	@endif

	<table class="table table-striped">	
		<tr>
			<th>crn</th>	
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
				<td>{{$schedule->crn}}</td>
				<td>{{$schedule->type}}</td>
				<td>{{Course::army_to_normal_time($schedule->start_time).' - '.Course::army_to_normal_time($schedule->end_time)}}</td>
				<td>{{$schedule->day}}</td>
				<td ><span data-toggle='tooltip' title="{{$schedule->room_name}}">{{$schedule->room_initial}}</span></td>
				<td>Lecturers</td>
				<td class="register-column">{{Form::checkbox('schedule[]',$schedule->crn)}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="6"></td>
				<td class="register-column">
					<input type="submit" class="btn btn-small btn-inverse " value="Register">
				</td>
			</tr>
		@else
			<tr>
				<td colspan="7">Empty</td>
			</tr>
		@endif
	</table>
	{{Form::close()}}
	<br>

	<div class="accordion-heading">
      		<a class="accordion-toggle comments-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        		Comments
        		<i class="icon-chevron-down" id="detail-search-dropdown-icon"></i>
      		</a>
    	</div>
    	<div id="collapseOne" class="accordion-body collapse in">
      	<div class="accordion-inner">
      	
			<div class="comments row-fluid">
				<div class="span1">
					<img src="{{URL::base().'/img/profile_pic.jpg'}}" class="img-rounded">
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
					<img src="{{URL::base().'/img/profile_pic.jpg'}}" class="img-rounded">
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
			{{HTML::link(URL::to_route("comments", $course_detail->id), "See All")}}
		</div>
		</div>
@endsection