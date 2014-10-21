<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_CAR_MODEL extends MODEL
{
	function MODEL_MECHANIC_CAR_MODEL()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_car_model';
		$this->id = 'car_model_id';
	}

}