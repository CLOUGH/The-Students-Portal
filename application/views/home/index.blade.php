@layout('layouts.default')

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
