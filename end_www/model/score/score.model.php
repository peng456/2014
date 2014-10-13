<?php
/**
 * score model class
 *
 * @author Liu Longbill
 * 2013-05-15
 */

class MODEL_SCORE extends MODEL
{
	function MODEL_SCORE()
	{
		$this->table = END_MYSQL_PREFIX.'score';
		$this->id = 'score_id';
	}
}