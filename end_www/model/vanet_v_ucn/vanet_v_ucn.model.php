<?php
/**
 * vanet_v_ucn model class
 *
 * @author lidongxu
 */

class MODEL_VANET_V_UCN extends MODEL
{
	function MODEL_VANET_V_UCN()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_v_ucn';
		$this->id = 'car_id';
	}
}