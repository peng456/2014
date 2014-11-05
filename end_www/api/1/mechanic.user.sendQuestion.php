<?php
/**
 * 2.2.	提交问题
 * API 2.2
 *
 * @author zhanglipeng  2014/10/19 23:22
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['type'])|| !isset($data['q_type_firstclass'])|| !isset($data['q_type_secondclass']) || !isset($data['brand']) || !isset($data['model']) || !isset($data['series']) || !isset($data['year']) || !isset($data['msg']))
{
    die_json_msg('参数错误', 10100);
}


//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}


$data_receive = json_decode($data['msg'],true);
$data_insert_question = array();
if($data_receive['text'])
{
	$data_insert_question ['text'] = $data_receive['text'];
};

if($data_receive['pic_data'])
{
	$data_insert_question ['picture'] = json_encode($data_receive['pic_data']);
};

if($data_receive['voice_data'])
{
	$data_insert_question ['voice'] =  json_encode($data_receive['voice_data']);
};

//关于此问题有关车的类型
$data_insert_question['brand'] = (int)$data['brand'];
$data_insert_question['model'] = (int)$data['model'];
$data_insert_question['series'] = (int)$data['series'];
$data_insert_question['year'] = (int)$data['year'];
$data_insert_question ['type'] = $data['type'];
$data_insert_question ['driver_user_id'] = (int)$token['owner_id'];
$data_insert_question ['reward'] = $data['reward'] ;
$data_insert_question ['view_count'] = 0 ;
$data_insert_question ['is_soluted'] = 0;
$data_insert_question ['is_accept'] =  0;
$data_insert_question ['create_time'] =  time();
$data_insert_question ['q_type_firstclass'] =  $data['q_type_firstclass'] ;
$data_insert_question ['q_type_secondclass'] =  $data['q_type_secondclass'] ;

if ($data['type'] == 0)
{
	$data_insert_question['quick_count'] = $data['quickcount'] ;
}

$now_time_range = $now_time - 60;
$question_item = model('mechanic_question')->set($data_insert_question,array('driver_user_id'=>$token['owner_id'],'text'=>$data_receive['text'],'where'=>"createtime > $now_time_range"));


if(!$question_item)
{
	die_json_msg('question表增加失败', 10101);
}

json_send(array(
	'q_id'=>$question_item 
	));

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	