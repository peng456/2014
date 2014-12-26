<?php
/**
 * 获取账户余额
 * API 1.13
 *
 * @author zhanglipeng	2014.12.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) )
{
	die_json_msg('参数错误', 10100);
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user','status'=>'valid','access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}

$item_remaindermoney  = model('mechanic_remaindermoney')->get_one($token['owner_id']);

json_send(array('remaindermoney'=>(int)$item_remaindermoney['money']));
