<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_QUESTION_MECHANIC extends MODEL
{
	function MODEL_MECHANIC_QUESTION_MECHANIC()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_question_mechanic';
		$this->id = 'qm_id';
	}
    function add($data=array())
    {
        $data['create_time'] = time();
        return parent::add($data);
    }

}