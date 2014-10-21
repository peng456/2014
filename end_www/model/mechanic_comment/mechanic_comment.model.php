<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_COMMENT extends MODEL
{
	function MODEL_MECHANIC_COMMENT()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_comment';
		$this->id = 'comment_id';
	}

}