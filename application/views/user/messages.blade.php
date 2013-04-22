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
      <table class="table table-hover">
 		<tr>
 			<th>From</th>
 			<th>Subject</th>
 			<th>Message</th>
 			<th></th>

 		</tr>

    
   @foreach($user->message_head as $message_head )
    
 		<tr>
 			<td>{{$message_head->user->first_name." ".$message_head->user->last_name}}</td>
 			<td>{{$message_head->subject}}</td>
 			<td>@foreach($message_head->message_body as $body){$body->message_body; break;}</td>
 			<td class="message_body"></td>	

 		</tr>
 	@endforeach
	</table>

    </div>
  </div>
</div>
@endsection