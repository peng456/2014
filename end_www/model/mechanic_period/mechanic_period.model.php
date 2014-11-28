<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_PERIOD extends MODEL
{
	function MODEL_MECHANIC_PERIOD()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_period';
		$this->id = 'id';
	}
}