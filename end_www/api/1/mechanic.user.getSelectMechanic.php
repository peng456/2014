<?php
/**
 * 获取待回答技师列表
 * API 2.3
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$mechanic_data = model('mechanic_accept')->get_list(array('q_id' => $data['q_id'] , 
                                                            'is_push'=> 0 ) ) ;

$data = array() ;
$count = 0 ;
$month_ago_time = time() - 30*24*3600 ;

foreach ($mechanic_data as $key => $value) 
{
	$userdata = model('mechanic_user')->get_one(array('user_id' => $value['mechanic_user_id']) ) ;
	$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
	$answer_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_answer WHERE mechanic_user_id = $userdata[user_id] AND create_time > $month_ago_time ") ;

	if (!$item || !$userdata || $answer_times === NULL )
    die_json_msg('user表或joininfo表无技师数据',20100);

	$upres = model('mechanic_accept')->update($value['accept_id'],array('is_push'=>1)) ;
	if (!$upres)
    die_json_msg('accept表更新失败',10101);

	$data[] = array(
		'id'=>(int)$userdata['user_id'] ,
		'name'=>(string)$joininfo['name'] ,
		'avatar'=>(string)$userdata['avatar'] ,
		'answer_times'=>(int)$answer_times ,
		'stars'=>(int)$joininfo['stars'] ,
		'response_time'=>(int)$joininfo['response_time'] ,
		'reputation'=>(int)$joininfo['reputation'] ,
		) ;

	$count++ ;
}



json_send(array('count'=>(int)$count ,'data'=>$data)) ;
