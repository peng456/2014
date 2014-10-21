<?php
/**
 * document model class
 *
 * @author liudanking
 */

class MODEL_MECHANIC_DOCUMENT extends MODEL
{
	function MODEL_MECHANIC_DOCUMENT()
	{
		$this->table = END_MYSQL_PREFIX.'mechanic_document';
		$this->id = 'document_id';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}

	function delete($id)
 	{
 		$url = $GLOBALS['db']->get_one("SELECT url FROM end_vanet_document where document_id = $id") ;
 		unlink(END_ROOT.$url['url']) ;
 		return parent::delete($id);
 	}

}