<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_FAVORITE extends MODEL
{
	function MODEL_MECHANIC_FAVORITE()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_favorite';
		$this->id = 'favorite_id';
	}

}