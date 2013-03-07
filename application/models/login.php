<?php 
class Login {
	public static $rules = array(
		'username'=>'required');
	
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}
?>