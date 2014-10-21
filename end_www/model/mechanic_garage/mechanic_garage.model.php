<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_GARAGE extends MODEL
{
	function MODEL_MECHANIC_GARAGE()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_garage';
		$this->id = 'garage_id';
	}

}