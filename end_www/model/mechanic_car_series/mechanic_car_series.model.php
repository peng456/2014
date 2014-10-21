<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_CAR_SERIES extends MODEL
{
	function MODEL_MECHANIC_CAR_SERIES()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_car_series';
		$this->id = 'car_series_id';
	}

}