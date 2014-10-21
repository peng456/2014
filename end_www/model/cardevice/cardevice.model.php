<?php
/**
 * user model class
 *
 * @author Liu Longbill
 */

class MODEL_CARDEVICE extends MODEL
{
	function MODEL_CARDEVICE()
	{
		$this->table = END_MYSQL_PREFIX.'cardevice';
		$this->id = 'device_id';
	}
	
	function add($data=array())
	{
		return parent::add($data);
	}

	function update($id,$data=array())
	{
		return parent::update($id,$data);
	}
}