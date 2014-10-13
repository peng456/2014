<?php
/**
 * document model class
 *
 * @author liudanking
 */

class MODEL_VANET_DOCUMENT extends MODEL
{
	function MODEL_VANET_DOCUMENT()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_document';
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