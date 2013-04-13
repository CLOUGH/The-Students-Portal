<?php

class LevelType extends Eloquent 
{
	public static $table='level_types';

	public function student(){
		return $this->has_many('Students');
	}
	
}
?>