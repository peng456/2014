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
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item){
    die_json_msg('access_token不可用',10600);
}
$user_id = $item['owner_id'] ;
$favorite_mechanic = model('mechanic_favorite')->get_list(array('driver_user_id'=>$user_id,'status'=>1)) ;

if ($favorite_mechanic)
{

	$count = 0 ;
	$resdata = array() ;
	foreach ($favorite_mechanic as $key => $value) 
	{

		$userdata = model('mechanic_user')->get_one(array('user_id' => $value['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('user表或joininfo表无技师数据',20100);

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
	$m_data = $db->get_all("SELECT user_id FROM end_mechanic_user WHERE role = 'mechanic'") ;
	if (!$m_data)
    	die_json_msg('数据库没有技师',10101) ;
    $mechanic_count = count($m_data);
    $return_count =  ($mechanic_count>5)?5:$mechanic_count;
    $resdata = array() ;
	for ($i=0; $i < $return_count; $i++)
	{
		//技师id
        $seletc_mid = mt_rand(0,count($m_data)-1) ;

        $userdata = model('mechanic_user')->get_one(array('user_id' => $m_data[$seletc_mid]['user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('user表或joininfo表无技师数据',20100);

		$resdata[] = array(
			'id'=>(int)$userdata['user_id'] ,
			'name'=>(string)$joininfo['name'] ,
			'avatar'=>(string)$userdata['avatar'] ,
			) ;

        unset($m_data[$seletc_mid]);
        sort($m_data);
	}
	json_send(array('is_favorite'=>0,'count'=>count($resdata),'data'=>$resdata) ) ;
}