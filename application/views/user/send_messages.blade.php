@layout('layouts.default')
@section('content')
<h2>Messages</h2>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
    	<ul class="nav nav-tabs nav-stacked">
              <li><a href="{{URL::to_route('send_messages')}}">Create New </a></li>
              <li><a href="#">Inbox</a></li>
              <li><a href="#">Sent Items</a></li>         
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

      {{Form::open("user/save_user_setting","POST")}}
       {{Form::label("to", "TO:")}}
        {{Form::text("to")}}
        {{Form::label("user_id", "User ID")}}
        {{Form::text("user_id",$user->id,array("disabled"))}}

        {{Form::label("subject", "Subject")}}
        {{Form::text("subject")}}

  
  </div>
</div>
@endsection