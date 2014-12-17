<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_PRODUCT_OPINION extends MODEL
{
	function MODEL_MECHANIC_PRODUCT_OPINION()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_product_opinion';
		$this->id = 'id';
	}
    function add($data=array())
    {
        $data['createtime'] = time();
        return parent::add($data);
    }

}