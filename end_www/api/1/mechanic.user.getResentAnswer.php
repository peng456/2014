<?php
/**
 * 获取最近提问列表
 * API 3.5
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['from']) || !is_numeric($data['from']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$from = $data['from'] ;
$mechanic_user_id = $item['owner_id'] ;
$count = 0 ;
$data = array() ;

$ma_data = $db->get_all("SELECT * FROM end_mechanic_answer WHERE mechanic_user_id = $mechanic_user_id ORDER BY create_time DESC LIMIT $from,10 ") ;
if (!$ma_data)
    	die_json_msg('没有回答过问题',30500) ;

foreach ($ma_data as $key => $value) 
{
	$count++ ;

	$q_data = model('mechanic_question')->get_one(array('q_id'=>$value['q_id'])) ;
	$userdata = model('mechanic_user')->get_one(array('user_id' => (int)$q_data['driver_user_id']) ) ;

	if (!$userdata || !$q_data )
    		die_json_msg('获取问题及用户信息失败',10101);

	$pictures = json_decode($q_data['picture']) ;
	$voices = json_decode($q_data['voice']) ;
	$question_data = array(
		'driver_user_id'=>(int)$userdata['user_id'] ,
		'driver_name'=>(string)$userdata['nickname'] ,
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
	if ($a_data === null)
    	die_json_msg('database error',10003) ;

    $answer_count = 0 ;
    $answer_data = array() ;
    foreach ($a_data as $key2 => $value2) 
    {
    	$answer_count++ ;
    	$userdata = model('mechanic_user')->get_one(array('user_id' => $value2['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('user表或joininfo表无技师数据',20100);

    	$pictures = json_decode($value2['picture']) ;
		$voices = json_decode($value2['voice']) ;

    	if ($value2['mechanic_user_id'] == $value['mechanic_user_id'])
    	{
    		$is_self = 1 ;
    	}
    	else
    	{
    		$is_self = 0 ;
    	}

		$answer_data[] = array(
			'mechanic_user_id'=>(int)$userdata['user_id'] ,
			'mechanic_name'=>(string)$joininfo['name'] ,
			'pay_amount'=>(int)$value2['pay_amount'] ,
			'is_self'=>(int)$is_self ,
			'a_id'=>(int)$value2['a_id'] ,
			'time'=>(int)$value2['create_time'] ,
			'text'=>(string)$value2['text'] ,
			'pic_count'=>(int)count($pictures) ,
			'pic_data'=>$pictures ,
			'voice_count'=>(int)count($voices) ,
			'voice_data'=>$voices ,
			) ;
    }

    $data[] = array('question_data'=>$question_data,'answer_count'=>(int)$answer_count,'answer_data'=>$answer_data) ;
}

json_send(array('count'=>(int)$count,'data'=>$data) ) ;