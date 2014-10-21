<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_ACCEPT extends MODEL
{
	function MODEL_MECHANIC_ACCEPT()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_accept';
		$this->id = 'accept_id';
	}


	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}