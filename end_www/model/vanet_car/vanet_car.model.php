<?php
/**
 * vanet_car model class
 *
 * @author lidongxu
 */

class MODEL_VANET_CAR extends MODEL
{
	function MODEL_VANET_CAR()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_car';
		$this->id = 'car_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}