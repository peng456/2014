<?php
/**
 * vanet_car model class
 *
 * @author lidongxu
 */

class MODEL_VANET_TOKEN extends MODEL
{
	function MODEL_VANET_TOKEN()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_token';
		$this->id = 'token_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}