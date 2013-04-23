@layout('layouts.default')
@section('content')
<h2>Messages</h2>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
    	<ul class="nav nav-tabs nav-stacked">
              <li><a href="{{URL::to_route('send_messages')}}">Create New </a></li>
              <li><a href="{{URL::to_route('messages')}}">Inbox</a></li>
              <li><a href="{{URL::to_route('sent_messages')}}">Sent Items</a></li>          
            </ul>
          
    </div>
    <div class="span10">
      <!--Body content-->
     @if($errors->has())
        <div class="alert alert-error">
          {{$errors->first('first_name', '<li>:message</li>')}} 
          {{$errors->first('last_name', '<li>:message</li>')}}
        </div>
      @endif

      {{Form::open("user/create_message","POST")}}
      {{Form::label("to", "TO:")}}
      {{Form::select('to', $advisors, Input::get('to'))}}
      {{Form::label("subject", "Subject")}}
      {{Form::text("subject", Input::get('subject'))}}
      {{Form::label("message", "Message")}}
      {{Form::textarea("message")}}
     <div>{{Form::submit('Submit');}}</div>
  
  </div>
</div>
@endsection