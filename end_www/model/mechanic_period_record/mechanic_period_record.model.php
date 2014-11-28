<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_PERIOD_RECORD extends MODEL
{
	function MODEL_MECHANIC_PERIOD_RECORD()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_period_record';
		$this->id = 'id';
	}
}