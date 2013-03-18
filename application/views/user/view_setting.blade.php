@layout('layouts.default')
@section('content')

<h4 class="page_heading">User Setting</h4>
<p>Name: {{$user->first_name." ".$user->last_name}}</p>
<p>Email: {{$user->email}}</p>
<p>Username: {{$user->username}}</p>
<p>Type: {{$user->user_type->name}}</p>
{{HTML::link_to_route("edit_setting", "Edit")}}
@endsection