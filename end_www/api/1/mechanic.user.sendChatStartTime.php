<?php
/**
 * 返回数据库中的车型信息
 * api 1.7
 *
 * @author duyifan	2014.10.20
 */
 
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['q_id']) ||!isset($data['q_start_time']))
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
$chat_group = array('q_id'=>$data['q_id'],'q_start_time'=>$data['q_start_time']);
$chat_group_item = model('mechanic_chat_group')->add($chat_group);
if(!$chat_group_item){
    die_json_msg('chat_group表增加失败', 21400);
}
json_send() ;



