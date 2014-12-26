<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_SERVER_MECHANIC extends MODEL
{
	function MODEL_MECHANIC_SERVER_MECHANIC()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_server_mechanic';
		$this->id = 'id';
	}

}