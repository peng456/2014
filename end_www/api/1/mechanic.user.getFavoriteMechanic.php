<?php
/**
 * 获取收藏技师列表，没有则返回推荐技师
 * API 2.1
 *
 * @author duyifan	2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) )
{
	die_json_msg('parameter invalid', 10001);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('token invalid',10000);

$user_id = $item['owner_id'] ;

$favorite_mechanic = model('mechanic_favorite')->get_list(array('driver_user_id'=>$user_id)) ;

if ($favorite_mechanic)
{

	$count = 0 ;
	$resdata = array() ;
	foreach ($favorite_mechanic as $key => $value) 
	{

		$userdata = model('mechanic_user')->get_one(array('user_id' => $value['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('user database error',10003);

		$resdata[] = array(
			'id'=>(int)$userdata['user_id'] ,
			'name'=>(string)$joininfo['name'] ,
			'avatar'=>(string)$userdata['avatar'] ,
			) ;
		$count++ ;
	}

	json_send(array('is_favorite'=>1,'count'=>(int)$count,'data'=>$resdata) ) ;
}
else
{
	$m_data = $db->get_all("SELECT user_id FROM end_mechanic_user WHERE role = \'mechanic\'") ;
	if (!$m_data)
    	die_json_msg('mechanic database error',10003) ;

    $resdata = array() ;
	for ($i=0; $i < 5; $i++) 
	{ 
		
		$seletc_mid = mt_rand(count($m_data)-1) ;
		$userdata = model('mechanic_user')->get_one(array('user_id' => $seletc_mid) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('mech user database error',10003);

		$resdata[] = array(
			'id'=>(int)$userdata['user_id'] ,
			'name'=>(string)$joininfo['name'] ,
			'avatar'=>(string)$userdata['avatar'] ,
			) ;
	}
	json_send(array('is_favorite'=>0,'count'=>5,'data'=>$resdata) ) ;
}