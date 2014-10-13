<?php
/**
 * vanet_car model class
 *
 * @author lidongxu
 */

class MODEL_MECHANIC_TOKEN extends MODEL
{
	function MODEL_MECHANIC_TOKEN()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_token';
		$this->id = 'token_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}