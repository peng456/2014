<?php
/**
 * maker model class
 *
 * @author deanmongel
 */

//继承自MODEL类
class MODEL_VANET_CAR_TRIP extends MODEL
{
	//指明model对用的数据库表和表中条目的id字段名
	function MODEL_VANET_CAR_TRIP()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_car_trip';
		$this->id = 'car_trip_id';
	}
}