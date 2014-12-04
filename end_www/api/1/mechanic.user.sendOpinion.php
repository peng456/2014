<?php
/**
 * 提交技师回答意向
 * API 3.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['text']))
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

$user_item = model('mechanic_user')->get_one( $token['owner_id']);

$now_time = time();
$data_insert = array();

$data_insert['user_id'] = $token['owner_id'];
$data_insert['role'] = $user_item['role'];
$data_insert['text'] = $data['text'];
$data_insert['createtime'] = $now_time;
$product_opinion_item  = model('mechanic_product_opinion')->set($data_insert,array('user_id' => $token['owner_id'],'text' => $data['text']));

if (!$product_opinion_item)
{
    die_json_msg('$product_opinion表增加失败', 10100);
}

json_send();