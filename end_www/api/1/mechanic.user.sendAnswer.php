<?php
/**
 * 2.2.	提交问题
 * API 2.2
 *
 * @author zhanglipeng  2014/10/19 23:22
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['q_id'])|| !is_numeric($data['q_id']) || !isset($data['msg']))
{
    die_json_msg('parameter invalid', 10001);
}


//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token  不可用', 10001);
}



$data_receive = json_decode($data['msg'],true);

$data_insert_answer = array();

if($data_receive['text'])
{
	$data_insert_answer ['text'] = $data_receive['text'];
};

if($data_receive['pic_data'])
{
	$data_insert_answer ['picture'] = json_encode($data_receive['pic_data']);
};

if($data_receive['voice_data'])
{
	$data_insert_answer ['voice'] = json_encode($data_receive['voice_data']);
};

$data_insert_answer ['q_id'] =  $data['q_id'];
$data_insert_answer ['mechanic_user_id'] = $token['owner_id'];

$data_insert_answer ['create_time'] =  time();



$answer_item = model('mechanic_answer')->add($data_insert_answer);


if(!$answer_item)
{
    die_json_msg('答案上传失败', 10001);

}
$q_id    = $data['q_id'];
$user_id = $token['owner_id'];
$questin_mechanic_sql =  "update end_mechanic_question_mechanic set  status =  1 where q_id = $q_id and  mechanic_user_id = $user_id";

$questin_mechanic_item = $db->query($questin_mechanic_sql);
if(!$questin_mechanic_item)
{
    die_json_msg('状态更新失败', 10001);
}


json_send(array(
	'a_id'=>$answer_item
	)) ;




	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	