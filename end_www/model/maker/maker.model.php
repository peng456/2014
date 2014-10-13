<?php
/**
 * maker model class
 *
 * @author liudanking
 */

class MODEL_MAKER extends MODEL
{
	function MODEL_MAKER()
	{
		$this->table = END_MYSQL_PREFIX.'maker';
		$this->id = 'maker_id';
	}

	function add($data=array())
	{
		if ($data['password'])
		{
			$data['password'] = end_encode($data['password']);
		}
		else
		{
			unset($data['password']);
		}
		$data['create_time'] = time();
		return parent::add($data);
	}

	function update($id, $data=array())
	{
		if ($data['password'])
		{
			$data['password'] = end_encode($data['password']);
		}
		else
		{
			unset($data['password']);
		}
		return parent::update($id,$data);
	}
}