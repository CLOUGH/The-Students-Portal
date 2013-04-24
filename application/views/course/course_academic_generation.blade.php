@layout('layouts.default')

@section('content')
<h4 class="page_heading">Academic Path</h4>
@if(empty($errors))
	@foreach($years as $year)	
		<div id="{{$year}}" class="academic_path_year">
			<h5 class="heading">{{($year." - ".(intval($year)+1))}}</h5>
			<div class="semester">
				<h5 class="heading">Semester 1</h5>
				@foreach($academic_path_courses  as $path_course)
					@if($path_course->year==$year && $path_course->course->semester=='1')
						<div class="path_course" id="{{$path_course->course_id}}">
							{{$path_course->course->title}}
						</div>
					@endif
				@endforeach
			</div>
			<div class="semester">
				<h5 class="heading">Semester 2</h5>
				@foreach($academic_path_courses  as $path_course)
					@if($path_course->year==''.(intval($year)+1) && $path_course->course->semester=='2')
						<div class="path_course" id="{{$path_course->course_id}}">
							{{$path_course->course->title}}
						</div>
					@endif
				@endforeach
			</div>
			

		</div>
	@endforeach
@else
	<H5>An error has occcured when generating your academic path please try again</H5>
@endif
@endsection
