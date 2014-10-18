<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_GOOD extends MODEL
{
	function MODEL_MECHANIC_GOOD()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_good';
		$this->id = 'good_id';
	}

}