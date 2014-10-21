<?php
/**
 * user model class
 *
 * @author liudanking
 */

class MODEL_UDMESSAGE extends MODEL
{
	function MODEL_UDMESSAGE()
	{
		$this->table = END_MYSQL_PREFIX.'udmessage';
		$this->id = 'message_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}

	function update($id,$data=array())
	{
		return parent::update($id,$data);
	}
}