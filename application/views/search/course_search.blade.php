@layout('layouts.default')

@section('content')
	<h4 class="page_heading">Search Course</h4>
	{{Form::open("search/search_course",'POST',array('id'=>'course_search_form'))}}
		
		<div class="row-fluid ">
		<div class="span6">
			{{Form::label("course_name", "Course Name")}}
			{{Form::text("course_name")}}

			{{Form::label("course_code", "Course Code")}}
			{{Form::text("course_name")}}

			{{Form::label("subject", "Subject")}}
			{{Form::text("subject")}}

			{{Form::label("level","Level")}}
			{{Form::select("level", array('all'=>'All','1'=>'1st','2'=>'2nd','3'=>'3rd','4'=>'4th','5'=>'5th'))}}
		</div>
		<div class="span6">
			{{Form::label("credit_range", "Credit Range")}}
			{{Form::text("credi_range_min",'',array('class'=>'span2'))}}to
			{{Form::text("credi_range_max",'',array('class'=>'span2'))}}

			{{Form::label("faculty", "Faculty")}}
			{{Form::select("faculty",$faculties)}}

			{{Form::label("degree", "Degree Name")}}
			{{Form::text("degree")}}

			{{Form::label("semester","Semesters")}}
			{{Form::select("semester", array('all'=>'All','1'=>'First','2'=>'Second','3'=>'Summer'))}}
			<br>
		</div>
		<div class="accordion-heading">
      		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        		Detailed Search
        		<i class="icon-chevron-down" id="detail-search-dropdown-icon"></i>
      		</a>
    	</div>
    	<div id="collapseOne" class="accordion-body collapse in">
      	<div class="accordion-inner">

      		{{Form::label("schedules","Schedules")}}
			{{Form::select("schedules", array('all'=>'All','lab'=>'Labs','lecture'=>'Lecturer','tutorial'=>'Tutorial'))}}
      		
			{{Form::label("lecture_name", "Lecture Name")}}
			{{Form::text("lecture_name")}}	

			{{Form::label("duration", "Class Duration")}}
			{{Form::text("duration",'',array('span2'))}}
			
			{{Form::label("type", "Course Type")}}
			<span class='course_search_checkbox'>{{Form::checkbox('type', 'theroy')}}Theoretical</span>
  			<span class='course_search_checkbox'>{{Form::checkbox('type', 'practical')}}Practical</span>

      		{{Form::label('days','Days')}}
      		<span class='course_search_checkbox'>{{Form::checkbox('days', 'mon')}}Mon</span>
      		<span class='course_search_checkbox'>{{Form::checkbox('days', 'tue')}}Tue</span>
      		<span class='course_search_checkbox'>{{Form::checkbox('days', 'wed')}}Wed</span>
      		<span class='course_search_checkbox'>{{Form::checkbox('days', 'thur')}}Thur</span>
      		<span class='course_search_checkbox'>{{Form::checkbox('days', 'fri')}}Fri</span>
      		<span class='course_search_checkbox'>{{Form::checkbox('days', 'sat')}}Sat</span>
			<br>
			<br>
					
		</div>
      	</div>
      	</div>

      	{{Form::submit("Search")}}
	{{Form::close()}}
@endsection
