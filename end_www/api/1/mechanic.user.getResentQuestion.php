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
$from_start = $data['from'] ;
$driver_user = model('mechanic_user')->get_one($driver_user_id);
if(!$driver_user){
    die_json_msg('无用户信息',10101);
}
$data = array() ;
$q_data = $db->get_all("SELECT * FROM end_mechanic_question WHERE driver_user_id = $driver_user_id ORDER BY create_time DESC LIMIT $from_start,10 ") ;
if (!$q_data)
    	die_json_msg('没有更多问题',20900) ;

foreach ($q_data as $key => $value) 
{
	$count++ ;
	$pictures = json_decode($value['picture']) ;
	$voices = json_decode($value['voice']) ;
    $q_type_firstclass  = model('mechanic_question_type_first')->get_one($value['q_type_firstclass']);
    $q_type_secondclass = model('mechanic_question_type')->get_one($value['q_type_secondclass']);
	$question_data = array(
        'driver_user_id'=>(int)$driver_user['user_id'] ,
        'driver_name'=>(string)$driver_user['lastname'].$driver_user['firstname'],
        'avatar'=>(string)$driver_user['avatar'] ,
		'q_id'=>(int)$value['q_id'] ,
        'q_type_firstclass'=>(string)$q_type_firstclass['content'],
        'q_type_secondclass'=>(string)$q_type_secondclass['content'],
		'time'=>(int)$value['create_time'] ,
		'text'=>(string)$value['text'] ,
		'pic_count'=>(int)count($pictures) ,
		'pic_data'=>$pictures ,
		'voice_count'=>(int)count($voices) ,
		'voice_data'=>$voices ,
        'q_status'=>(int)$value['q_status']
	) ;

	$a_data = model('mechanic_answer')->get_list(array('q_id'=>$value['q_id'])) ;

    $answer_count = 0 ;
    $answer_data = array() ;
    foreach ($a_data as $key2 => $value2) 
    {
        $answer_count++ ;
    	$userdata = model('mechanic_user')->get_one(array('user_id' => $value2['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

		if (!$userdata || !$joininfo )
    		die_json_msg('database error',10003);

        $answer_pictures = json_decode($value2['picture']) ;
        $answer_voices = json_decode($value2['voice']) ;
        $driver_judgescore = model('mechanic_judgescore')->get_one(array('a_id'=>$value2['a_id']));
        $judgescore_avg = ((float)$driver_judgescore['resolution']+(float)$driver_judgescore['response_time']+(float)$driver_judgescore['attitude'])/3;


        $answer_data[] = array(
            'mechanic_user_id'=>(int)$userdata['user_id'] ,
            'mechanic_avatar'=>(string)$userdata['avatar'] ,
            'mechanic_name'=>(string)$joininfo['name'] ,
            'pay_amount'=>(int)$value2['pay_amount'] ,
            'a_id'=>(int)$value2['a_id'] ,
            'time'=>(int)$value2['create_time'] ,
            'text'=>(string)$value2['text'] ,
            'pic_count'=>(int)count( $answer_pictures) ,
            'pic_data'=> $answer_pictures ,
            'voice_count'=>(int)count($answer_voices) ,
            'voice_data'=>$answer_voicesvoices ,
            'driver_judgescore'=>round($judgescore_avg,1)
			);
      }

    $data[] = array('question_data'=>$question_data,'answer_count'=>(int)$answer_count,'answer_data'=>$answer_data) ;

}

json_send(array('count'=>(int)$count,'data'=>$data) ) ;
