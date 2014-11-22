<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_SERVER extends MODEL
{
	function MODEL_MECHANIC_SERVER()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_server';
		$this->id = 'id';
	}

}