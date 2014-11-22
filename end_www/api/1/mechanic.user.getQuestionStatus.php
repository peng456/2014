<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.14
 */
 
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['q_id']))
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
$question_status = model('mechanic_question')->get_one(array('select'=>'q_status','q_id'=>$data['q_id']));
json_send(array(
    'question_status'=>(int)$question_status['q_status']
));
