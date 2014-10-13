<?php
/**
 * maker model class
 *
 * @author deanmongel
 */

//继承自MODEL类
class MODEL_VANET_ERRORDATA extends MODEL
{
	//指明model对用的数据库表和表中条目的id字段名
	function MODEL_VANET_ERRORDATA()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_errordata';
		$this->id = 'errordata_id';
	}

	//可以自行重写函数，以满足不同需求，这里在数据中添加了一项创建时间
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}