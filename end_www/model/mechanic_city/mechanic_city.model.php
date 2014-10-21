<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_CITY extends MODEL
{
	function MODEL_MECHANIC_CITY()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_city';
		$this->id = 'city_id';
	}
}