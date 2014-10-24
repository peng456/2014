<?php
/**
 * 提交技师回答意向
 * API 3.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['q_id']) || !is_numeric($data['q_id']))
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

$accept_item  = model('mechanic_accept')->add(array('q_id'=>(int)$data['q_id'],'mechanic_user_id'=>(int)$token['owner_id'],'create_time'=>time(),'is_push'=>0));



if (!$accept_item)
{
    die_json_msg('accept表增加失败', 10100);
}

json_send(
        array()
);

