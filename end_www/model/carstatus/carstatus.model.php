<?php
/**
 * car status model class
 *
 * @author liudanking
 */

class MODEL_CARSTATUS extends MODEL
{
	function MODEL_CARSTATUS()
	{
		$this->table = END_MYSQL_PREFIX.'carstatus';
		$this->id = 'status_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}

	function update($id,$data=array())
	{
		return parent::update($id,$data);
	}
}