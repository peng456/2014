<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_FIELD extends MODEL
{
	function MODEL_MECHANIC_FIELD()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_field';
		$this->id = 'id';
	}

}