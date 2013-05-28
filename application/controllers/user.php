<?php
class User_Controller extends Base_Controller {

	public $restful = true;    

	public function get_view_setting()
    {
    	return View::make('user.view_setting')
    		->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
			->with('user',User::find(Auth::user()->id));
    }
    public function get_edit_setting()
    { 
    	return View::make('user.edit_setting')
    		->with('title','Search for Students')
			->with('active_navigation',parent::$acitve_navigation)
			->with('user_type', Auth::user()->type)
			->with('user_first_name', Auth::user()->first_name)
            ->with('user',User::find(Auth::user()->id));
    }
    public function post_save_user_setting(){
        $validation = User::validate(Input::all());

        if($validation->fails())
        {   
            return Redirect::to_route('edit_setting')->with_errors($validation)->with_input();
            
        }else{
            // $user = User::find(Auth::user()->id);
            // $user->update(array(
            //     "first_name"=>Input::get('first_name'),
            //     "last_name"=>Input::get('last_name'),
            //     "new_password"=>Input::get('new_password')));
        }
        return Redirect::to_route("view_setting");
     }
    public function get_messages()
    {
        return View::make('user.messages')
            ->with('title','Inbox')
            ->with('active_navigation',parent::$acitve_navigation)
            ->with('user_type', Auth::user()->type)
            ->with('user_first_name', Auth::user()->first_name)
            ->with('messages',MessageHead::where("to", "=", Auth::user()->id)->get());

    }
    public function get_sent_messages(){
          return View::make('user.sent_messages')
            ->with('title','Sent Message')
            ->with('active_navigation',parent::$acitve_navigation)
            ->with('user_type', Auth::user()->type)
            ->with('user_first_name', Auth::user()->first_name)
            ->with('messages',MessageHead::where("user_id", "=", Auth::user()->id)->get());
    }
    public function get_send_messages()
    {
        return View::make('user.send_messages')
            ->with('title','New Message')
            ->with('active_navigation',parent::$acitve_navigation)
            ->with('user_type', Auth::user()->type)
            ->with('user_first_name', Auth::user()->first_name)
            ->with('user',User::find(Auth::user()->id))
            ->with('advisors', Auth::user()->find_messageable_users())
            ->with('send_messages',User::find(Auth::user()->id));
    }
    public function post_create_message(){
       
        $message_head = MessageHead::create(array(
            "to" => Input::get("to"),
            "user_id"=>Auth::user()->id,
            "subject"=>Input::get("subject")
        ));
        $message_body = MessageBody::create(array(
            "user_id"=>Auth::user()->id,
            "message_head_id"=>$message_head->id,
            "message_body"=>Input::get("message")
            ));
        return Redirect::to(URL::to_route('messages'));
        
    }




}