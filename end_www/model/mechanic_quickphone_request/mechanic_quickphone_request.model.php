<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_QUICKPHONE_REQUEST extends MODEL
{
	function MODEL_MECHANIC_QUICKPHONE_REQUEST()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_quickphone_request';
		$this->id = 'id';
	}


	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}