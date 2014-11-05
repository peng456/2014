<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_QUESTION_TYPE_FIRST extends MODEL
{
	function MODEL_MECHANIC_QUESTION_TYPE_FIRST()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_question_type_first';
		$this->id = 'q_type_id';
	}

}