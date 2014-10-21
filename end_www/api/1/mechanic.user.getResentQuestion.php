<?php
/**
 * 获取最近提问列表
 * API 2.9
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['from']) )
{
	die_json_msg('parameter invalid', 10001);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('token invalid',10000);

$dirver_user_id = $item['owner_id'] ;
$count = 0 ;
$data = array() ;
$q_data = get_all("SELECT * FROM end_mechanic_question WHERE dirver_user_id = $dirver_user_id ORDER BY create_time DESC LIMIT $data[from],10 ") ;
if (!$q_data)
    	die_json_msg('database error',10003) ;

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
	) ;

	$a_data = model('mechanic_answer')->get_list(array('q_id'=>$value['q_id'])) ;
	if (!$a_data)
    	die_json_msg('database error',10003) ;

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
			) ;
    }

    $data[] = array('question_data'=>$question_data,'mechanic_count'=>(int)$mechanic_count,'mechanic_data'=>$mechanic_data) ;
}

json_send(array('count'=>(int)$count,'data'=>$data) ) ;