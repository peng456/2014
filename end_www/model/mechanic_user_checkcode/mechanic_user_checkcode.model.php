<?php
/**
 * maker model class
 *
 * @author deanmongel
 */

//继承自MODEL类
class MODEL_MECHANIC_USER_CHECKCODE extends MODEL
{
	//指明model对用的数据库表和表中条目的id字段名
	function MODEL_MECHANIC_USER_CHECKCODE()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_user_checkcode';
		$this->id = 'checkcode_id';
	}
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
}