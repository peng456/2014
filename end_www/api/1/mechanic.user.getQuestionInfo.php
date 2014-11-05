<?php
/**
 * 抢答及获得问题详情
 * API 3.2
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']) || !is_numeric($data['q_id']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

if ($data['q_id'] == 0)
{
	$q_data = $db->get_all("SELECT q_id FROM end_mechanic_question WHERE is_soluted = 0 AND is_accept = 0") ;
	if (!$q_data)
    	die_json_msg('系统没有待解决问题',30200) ;

	//此处添加问题筛选程序
	$seletc_qid = mt_rand(0,count($q_data)-1) ;
	$select_qdata = model('mechanic_question')->get_one(array('q_id'=>$q_data[$seletc_qid]['q_id'])) ;

	$userdata = model('mechanic_user')->get_one(array('user_id'=>$select_qdata['driver_user_id'])) ;

	if (!$select_qdata || !$userdata)
    	die_json_msg('无此问题或无提问者数据',10101);

	$pictures = json_decode($select_qdata['picture']) ;
	$voices = json_decode($select_qdata['voice']) ;
	$month_ago_time = time() - 30*24*3600 ;
	$question_count = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_question WHERE driver_user_id = $userdata[user_id] AND create_time > $month_ago_time ") ;

	if ($question_count === null)
    	die_json_msg('question表查询失败',10101);
    $q_type_firstclass  = model('mechanic_question_type_first')->get_one($select_qdata['q_type_firstclass']);
    $q_type_secondclass = model('mechanic_question_type')->get_one($select_qdata['q_type_secondclass']);

	$res_data = array(
		'q_id'=>(int)$select_qdata['q_id'] ,
		'user_id'=>(int)$userdata['user_id'] ,
		'nickname'=>(string)$userdata['nickname'] ,
		'avatar'=>(string)$userdata['avatar'] ,
		'question_count'=>(int)$question_count ,
        'q_type_firstclass'=>(string)$q_type_firstclass['content'],
        'q_type_secondclass'=>(string)$q_type_secondclass['content'],
		'reward'=>(int)$select_qdata['reward'] ,
		'text'=>(string)$select_qdata['text'] ,
		'pic_count'=>(int)count($pictures) ,
		'pic_data'=>$pictures ,
		'voice_count'=>(int)count($voices) ,
		'voice_data'=>$voices ,
	) ;


	$res = model('mechanic_question')->update($select_qdata['q_id'],array('view_count'=>((int)$select_qdata['view_count']+1)) ) ;
	if (!$select_qdata || !$res)
    	die_json_msg('question表查询或更新失败',10101);
    
    unset($res) ;
    if ($select_qdata['q_status'] == 0)
    {
    	$res = model('mechanic_question')->update($select_qdata['q_id'],array('q_status'=>1 )) ;
		if (!$res)
	    	die_json_msg('question表更新q_status失败',10101);
	}
	json_send($res_data) ;
}
else
{
	$q_data = model('mechanic_question')->get_one(array('q_id'=>$data['q_id'])) ;
	$userdata = model('mechanic_user')->get_one(array('user_id'=>$q_data['driver_user_id'])) ;

	if (!$q_data || !$userdata)
    	die_json_msg('database error',10003);

	$pictures = json_decode($q_data['picture']) ;
	$voices = json_decode($q_data['voice']) ;
	$month_ago_time = time() - 30*24*3600 ;
	$question_count = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_question WHERE driver_user_id = $userdata[user_id] AND create_time > $month_ago_time ") ;

	if ($question_count === null)
    	die_json_msg('question表查询失败',10101);

	$res_data = array(
		'q_id'=>(int)$data['q_id'] ,
		'user_id'=>(int)$userdata['user_id'] ,
		'nickname'=>(string)$userdata['nickname'] ,
		'avatar'=>(string)$userdata['avatar'] ,
		'question_count'=>(int)$question_count ,
		'q_type'=>(int)$q_data['type'] ,
		'reward'=>(int)$q_data['reward'] ,
		'text'=>(string)$q_data['text'] ,
		'pic_count'=>(int)count($pictures) ,
		'pic_data'=>$pictures ,
		'voice_count'=>(int)count($voices) ,
		'voice_data'=>$voices ,
	) ;

	json_send($res_data) ;
}
