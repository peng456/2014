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
$chat_group_item = model('mechanic_chat_group')->get_one(array('select'=>'q_id,huanxin_messages,q_end_time','q_id'=>$data['q_id']));
if(!$chat_group_item['q_end_time']){
    die_json_msg('此问题还没有结束', 11000);
}
json_send(array(
    'q_id'=>(int)$chat_group_item['q_id'],
    'messages'=>json_decode($chat_group_item['huanxin_messages'])
));
