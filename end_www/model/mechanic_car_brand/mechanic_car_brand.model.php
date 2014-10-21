<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_CAR_BRAND extends MODEL
{
	function MODEL_MECHANIC_CAR_BRAND()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_car_brand';
		$this->id = 'car_brand_id';
	}

}