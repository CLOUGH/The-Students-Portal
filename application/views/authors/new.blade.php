@layout('layouts.default')

@section('content')
	<h1>Add New Page</h1>
	
	@if($errors->has())
	<div class="alert alert-error">
		{{$errors->first('name', '<li>:message</li>')}}	
		{{$errors->first('bio', '<li>:message</li>')}}
	</div>
	@endif

	{{Form::open("authors/create",'POST')}}
		
		{{Form::label('name', 'Name')}}
		{{Form::text('name',Input::old('name'))}}
	
		{{Form::label('bio', 'Biography')}}
		{{Form::textarea('bio',Input::old('bio'))}}
	
		{{Form::submit('Add Author')}}
		
	{{Form::close()}}
@endsection