<?php

class Schedule extends Eloquent 
{
	public function course()
	{
		return $this->belongs_to('Course');
	}
	public function student()
	{
		return $this->has_many_and_belongs_to('Student','registered_schedules');
	}
	public function type()
	{
		return $this->belongs_to('ScheduleType','schedule_type_id');
	}
	public function room()
	{
		return $this->belongs_to('LectureRoom','room_id');
	}
}