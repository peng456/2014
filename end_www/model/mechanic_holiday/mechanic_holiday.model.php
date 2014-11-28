<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_HOLIDAY extends MODEL
{
	function MODEL_MECHANIC_HOLIDAY()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_holiday';
		$this->id = 'id';
	}
}