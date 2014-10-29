<?php
/**
 * 获取最近提问列表
 * API 2.9
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['from']) || !is_numeric($data['from']) )
{
	die_json_msg('参数错误', 10100);
}
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item)
    die_json_msg('access_token不可用',10600);

$driver_user_id = $item['owner_id'] ;
$count = 0 ;
$from = $data['from'] ;

$data = array() ;
$q_data = $db->get_all("SELECT * FROM end_mechanic_question WHERE driver_user_id = $driver_user_id ORDER BY create_time DESC LIMIT $from,10 ") ;
if (!$q_data)
    	die_json_msg('没有更多问题',20900) ;

foreach ($q_data as $key => $value) 
{
	$count++ ;
	$pictures = json_decode($value['picture']) ;
	$voices = json_decode($value['voice']) ;
	$question_data = array(
		'q_id'=>(int)$value['q_id'] ,
		'time'=>(int)$value['create_time'] ,
		'text'=>(string)$value['text'] ,
		'pic_count'=>(int)count($pictures) ,
		'pic_data'=>$pictures ,
		'voice_count'=>(int)count($voices) ,
		'voice_data'=>$voices ,
        'q_status'=>(int)$value['q_status']
	) ;

	$a_data = model('mechanic_answer')->get_list(array('q_id'=>$value['q_id'])) ;

    $mechanic_count = 0 ;
    $mechanic_data = array() ;
    foreach ($a_data as $key2 => $value2) 
    {
    	$mechanic_count++ ;
    	$userdata = model('mechanic_user')->get_one(array('user_id' => $value2['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('database error',10003);

		$mechanic_data[] = array(
			'id'=>(int)$userdata['user_id'] ,
			'name'=>(string)$joininfo['name'] ,
			'avatar'=>(string)$userdata['avatar'] ,
			'a_id'=>(int)$value2['a_id'] ,
			);
    }

    $data[] = array('question_data'=>$question_data,'mechanic_count'=>(int)$mechanic_count,'mechanic_data'=>$mechanic_data) ;
}

json_send(array('count'=>(int)$count,'data'=>$data) ) ;