<?php

class ScheduleType extends Eloquent 
{
	public static $table ='schedule_types';

	public function schedule(){
		return $this->has_many('Schedule');
	}
}