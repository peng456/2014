<?php
/**
 * vanet_v_var_nobd model class
 *
 * @author lidongxu
 */

class MODEL_VANET_V_CAR_NOBD extends MODEL
{
	function MODEL_VANET_V_CAR_NOBD()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_v_car_nobd';
		$this->id = 'car_id';
	}
}