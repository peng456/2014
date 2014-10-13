<?php
/**
 * user model class
 *
 * @author lidongxu
 */

class MODEL_VANET_USER extends MODEL
{
	function MODEL_VANET_USER()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_user';
		$this->id = 'user_id';
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

	function get_one($data = array()) {
		if (is_array($data)) {
			if ($data['password']) {
				$data['password'] = end_encode($data['password']);
			}
			else {
				unset($data['password']);
			}
		}
		return parent::get_one($data);
	}

	function update($id,$data=array())
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