<?php
/**
 * APP version model class
 *
 * @author liudanking @ 2013.12.17
 */

class MODEL_MECHANIC_PROFESSIONAL_FIELD extends MODEL
{
	function MODEL_MECHANIC_PROFESSIONAL_FIELD()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_professional_field';
		$this->id = 'id';
	}

}