<?php
/**
 * maker model class
 *
 * @author liudanking
 */

class MODEL_VANET_USERCAR extends MODEL
{
	function MODEL_VANET_USERCAR()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_usercar';
		$this->id = 'r_id';
	}

	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}

	function delete($data) {
		if (is_array($data)) {
			$val = $this->get_one($data);
			$data = $val['r_id'];
		}
		return parent::delete($data);
	}
}