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

$ma_data = $db->get_all("SELECT * FROM end_mechanic_accept WHERE mechanic_user_id = $mechanic_user_id ORDER BY create_time DESC LIMIT $from,10 ") ;
if (!$ma_data)
    	die_json_msg('没有回答过问题',30500) ;

foreach ($ma_data as $key => $value)
{
	$count++ ;

	$q_data = model('mechanic_question')->get_one(array('q_id'=>$value['q_id'])) ;
	$userdata = model('mechanic_user')->get_one(array('user_id' => (int)$q_data['driver_user_id']) ) ;
  	if (!$userdata || !$q_data )
    		die_json_msg('获取问题及用户信息失败',10101);
    $q_type_firstclass  = model('mechanic_question_type_first')->get_one($q_data['q_type_firstclass']);
    $q_type_secondclass = model('mechanic_question_type')->get_one($q_data['q_type_secondclass']);
	$pictures = json_decode($q_data['picture']) ;
	$voices = json_decode($q_data['voice']) ;
	$question_data = array(
		'driver_user_id'=>(int)$userdata['user_id'] ,
		'driver_name'=>(string)$userdata['nickname'] ,
		'driver_avatar'=>(string)$userdata['avatar'] ,
		'q_id'=>(int)$value['q_id'] ,
        'q_type_firstclass'=>(string)$q_type_firstclass['content'],
        'q_type_secondclass'=>(string)$q_type_secondclass['content'],
		'time'=>(int)$q_data['create_time'] ,
		'text'=>(string)$q_data['text'] ,
		'pic_count'=>(int)count($pictures) ,
		'pic_data'=>$pictures ,
		'voice_count'=>(int)count($voices) ,
		'voice_length'=>(int)$q_data['voice_length'] ,
		'voice_data'=>$voices ,
        'q_status'=>(int)$q_data['q_status']
	) ;

	$a_data = model('mechanic_answer')->get_list(array('q_id'=>$value['q_id'],'mechanic_user_id'=>$item['owner_id'])) ;
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
        $driver_judgescore = model('mechanic_judgescore')->get_one(array('a_id'=>$value2['a_id']));
        $judgescore_avg = ((float)$driver_judgescore['resolution']+(float)$driver_judgescore['response_time']+(float)$driver_judgescore['attitude'])/3;


        $answer_data[] = array(
			'mechanic_user_id'=>(int)$userdata['user_id'] ,
			'mechanic_name'=>(string)$joininfo['name'] ,
			'mechanic_avatar'=>(string)$userdata['avatar'] ,
			'pay_amount'=>(int)$value2['pay_amount'],
			'is_self'=>(int)$is_self,
			'a_id'=>(int)$value2['a_id'] ,
			'time'=>(int)$value2['create_time'] ,
			'text'=>(string)$value2['text'] ,
			'pic_count'=>(int)count($pictures) ,
			'pic_data'=>$pictures ,
			'voice_count'=>(int)count($voices) ,
            'voice_length'=>(int)$value2['voice_length'] ,
			'voice_data'=>$voices ,
            'driver_judgescore'=>round($judgescore_avg,1)
			) ;
    }

    $data[] = array('question_data'=>$question_data,'answer_count'=>(int)$answer_count,'answer_data'=>$answer_data) ;
}

json_send(array('count'=>(int)$count,'data'=>$data) ) ;
