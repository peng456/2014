<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_VANET_APPVERSION extends MODEL
{
	function MODEL_VANET_APPVERSION()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_appversion';
		$this->id = 'appversion_id';
	}


	function add($data=array())
	{
		$data['create_time'] = time();
		$data['status'] = '1'; # 添加时设置为当前
		$data['platform'] = addslashes($data['platform']);
		# 将以前当前的appversion设置为旧版本
		global $db;
		$db->query("UPDATE end_vanet_appversion set status=0 where platform='$data[platform]' and status=1");
		return parent::add($data);
	}
}