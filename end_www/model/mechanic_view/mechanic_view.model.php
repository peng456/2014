<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_VIEW extends MODEL
{
	function MODEL_MECHANIC_VIEW()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_view';
		$this->id = 'view_id';
	}

}