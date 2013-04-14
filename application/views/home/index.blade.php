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
	<div class="row">
		<div class="span12">
			<div class="span9">
				<h4 class="page_heading">News</h4>
				@foreach($news_list as $news)
					<div class="post" >
						<div class="post_date">
							<p class="date">
								{{$news->s_updated_at()[1]}}
								<br>
								<span style="font-size: 14px">{{$news->s_updated_at()[2]}}</span>
							</p>
						</div>
						<div class="post_header">
							<h5>{{$news->title}}</h5>
						</div>	
						<div class="post_body">					
							<p class="message">{{$news->body}}</p>
						</div>
					</div>
				@endforeach
			</div>
			<div class="span2 home_sidebar">
				sidebar
			</div>
		</div>
	</div>
@endsection
