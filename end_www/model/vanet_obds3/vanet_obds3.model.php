<?php
/**
 * vanet_car model class
 *
 * @author lidongxu
 */

class MODEL_VANET_OBDS3 extends MODEL
{
	function MODEL_VANET_OBDS3()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_obds3';
		$this->id = 'obds3_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}