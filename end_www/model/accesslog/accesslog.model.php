<?php
/**
 * user model class
 *
 * @author liudanking
 */

class MODEL_ACCESSLOG extends MODEL
{
	function MODEL_ACCESSLOG()
	{
		$this->table = END_MYSQL_PREFIX.'accesslog';
		$this->id = 'accesslog_id';
	}
	
	function add($data=array())
	{
		$data['access_time'] = time();
		return parent::add($data);
	}

	function update($id,$data=array())
	{
		return parent::update($id,$data);
	}
}