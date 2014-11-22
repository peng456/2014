<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_CHAT_GROUP extends MODEL
{
	function MODEL_MECHANIC_CHAT_GROUP()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_chat_group';
		$this->id = 'id';
	}


	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}