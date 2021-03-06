@layout('layouts.default')
@section('content')

<h2>{{$title}}</h2>
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
    <div class="span5">
      <!--Body content-->
      <table class="table table-hover">
 		<tr>
 			<th>From</th>
 			<th>Subject</th>
 			<th>Message Excerpt</th>
      <th></th>
 		</tr>

    
   @foreach($messages as $message )
    
 		<tr class="message" data-message-body="{{$message->body()}}">
 			<td class="message-user-name">{{$message->user->first_name." ".$message->user->last_name}}</td>
 			<td class="message-subject">{{$message->subject}}</td>
      <td>{{$message->excerpt()}}</td>
      <td><a class="btn btn-success" href="{{URL::to_route('send_messages')}}?to={{$message->user->id}}&subject=Re:{{$message->subject}}">Reply</a></td>
 		</tr>
 	@endforeach
	</table>

    </div>

    <div id="message-container" class="span5">

    </div>
  </div>
</div>
@endsection