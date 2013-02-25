@layout('layouts.default')

@section('content')
	<h1>{{ $author->name}}</h1>

	<p>{{$author->bio}}</p>
	<p><small>{{$author->updated_at}}</small></p>
@endsection