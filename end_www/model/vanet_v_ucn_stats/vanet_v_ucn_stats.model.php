<?php
/**
 * vanet_v_ucn model class
 *
 * @author lidongxu
 */

class MODEL_VANET_V_UCN_STATS extends MODEL
{
	function MODEL_VANET_V_UCN_STATS()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_v_ucn_stats';
		$this->id = 'car_id';
	}
}