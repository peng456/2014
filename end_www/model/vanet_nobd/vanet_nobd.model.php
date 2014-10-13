<?php
/**
 * maker model class
 *
 * @author liudanking
 */

class MODEL_VANET_NOBD extends MODEL
{
	function MODEL_VANET_NOBD()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_nobd';
		$this->id = 'nobd_id';
	}

	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}