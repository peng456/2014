<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_ANSWER extends MODEL
{
	function MODEL_MECHANIC_ANSWER()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_answer';
		$this->id = 'a_id';
	}


	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}