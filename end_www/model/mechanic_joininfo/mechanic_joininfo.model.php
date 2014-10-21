<?php
/**
 * user model class
 *
 * @author lidongxu
 */

class MODEL_MECHANIC_JOININFO extends MODEL
{
	function MODEL_MECHANIC_JOININFO()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_joininfo';
		$this->id = 'joininfo_id';
	}

}