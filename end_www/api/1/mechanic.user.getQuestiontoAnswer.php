<?php
/**
 * 获取待回答问题缩略信息及正在回答技师列表
 * API 2.6
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']) ||!is_numeric($data['q_id']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$q_data = model('mechanic_question')->get_one(array('q_id'=>$data['q_id']) ) ;
if (!$q_data )
    die_json_msg('问题id无效',20600);

$pictures = json_decode($q_data['picture']) ;
$voices = json_decode($q_data['voice']) ;
$question_data = array(
	'text'=>(string)$q_data['text'] ,
	'pic_count'=>(int)count($pictures) ,
	'pic_data'=>$pictures ,
	'voice_count'=>(int)count($voices) ,
	'voice_data'=>$voices ,
	'create_time'=>(int)$q_data['create_time']
	) ;

$mechanic_data = array() ;
$mechanic_count = 0 ;
$m_data = model('mechanic_question_mechanic')->get_list(array('q_id'=>$data['q_id']) ) ;
foreach ($m_data as $key => $value) 
{
	$userdata = model('mechanic_user')->get_one(array('user_id' => $value['mechanic_user_id']) ) ;
	$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
	
	if (!$item || !$userdata)
    die_json_msg('user表或joininfo表无技师数据',20100);
    //
    $answer_item = model('mechanic_answer')->get_one(array('q_id'=>(int)$data['q_id']));

	$mechanic_data[] = array(
		'id'=>(int)$userdata['user_id'] ,
		'name'=>(string)$joininfo['name'] ,
		'avatar'=>(string)$userdata['avatar'] ,
		'status'=>(int)$value['status'] ,
        'a_id'=>(int)$answer_item['q_id']
		) ;
	$mechanic_count++ ;
}

json_send(array('question_data'=>$question_data,'mechanic_count'=>(int)$mechanic_count ,'mechanic_data'=>$mechanic_data)) ;
