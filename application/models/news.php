<?php 
class News extends Eloquent{
	public static  $table = 'news';
	
	public function  s_updated_at()
	{	
		$string_dates = array("JAN", "FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
		$new_date = preg_split('/[- :]/',substr($this->updated_at, 0, 9));
		$new_date[2] = $string_dates[intval($new_date[2])];
		$new_date[1] = intval($new_date[1]);
		return $new_date;
	}
}
?>