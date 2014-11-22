<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_DRIVER_MECHANIC_QUESTION extends MODEL
{
	function MODEL_MECHANIC_DRIVER_MECHANIC_QUESTION()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_driver_mechanic_question';
		$this->id = 'id';
	}
    function add($data=array())
    {
        $data['createtime'] = time();
        return parent::add($data);
    }

}