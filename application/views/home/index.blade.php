@layout('layouts.default')

@section('banner')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#slider').rhinoslider({
				showTime: 30000,
				autoPlay:true,
				controlsMousewheel:false,
				showBullets:'never',
				controlsKeyboard:false,
				showControls:'never',
				slideNextDirection: 'toLeft',
				pauseOnHover:false
			});
		});
	</script>
	<style type="text/css">
		

		
	</style>
		<ul id="slider">
	        <li><img src="{{URL::base().'/img/School_Children.jpg'}}" alt="" /></li>
	        <li><img src="{{URL::base().'/img/DevelopmentBrochureImages-007.jpg'}}" alt="" /></li>
	        <li><img src="{{URL::base().'/img/Ghent_Oren.jpg'}}" alt="" /></li>
	        <li><img src="{{URL::base().'/img/studying.jpg'}}" alt="" /></li>
	    </ul>
@endsection

@section('content')
	
	<h4 class="page_heading">News</h4>
	@foreach($news_list as $news)
		<div class="post" >
			<h5>{{$news->title}}</h5>
			<p class="message">{{$news->body}}</p>
			<small class="news_date">{{substr($news->updated_at, 0, 9); }}</small>
		</div>
	@endforeach
@endsection
