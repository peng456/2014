<?php
/**
 * maker model class
 *
 * @author liudanking
 */

class MODEL_VANET_OBDDATA extends MODEL
{
	function MODEL_VANET_OBDDATA()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_obddata';
		$this->id = 'obddata_id';
	}

	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}