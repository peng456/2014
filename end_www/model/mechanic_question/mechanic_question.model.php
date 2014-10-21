<<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_QUESTION extends MODEL
{
	function MODEL_MECHANIC_QUESTION()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_question';
		$this->id = 'q_id';
	}

}