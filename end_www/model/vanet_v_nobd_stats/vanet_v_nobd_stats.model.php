<?php
/**
 * vanet_v_ucn model class
 *
 * @author lidongxu
 */

class MODEL_VANET_V_NOBD_STATS extends MODEL
{
	function MODEL_VANET_V_NOBD_STATS()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_v_nobd_stats';
		$this->id = 'nobd_id';
	}
}