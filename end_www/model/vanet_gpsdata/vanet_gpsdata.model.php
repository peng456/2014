<?php
/**
 * maker model class
 *
 * @author liudanking
 */

class MODEL_VANET_GPSDATA extends MODEL
{
	function MODEL_VANET_GPSDATA()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_gpsdata';
		$this->id = 'gpsdata_id';
	}

	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}