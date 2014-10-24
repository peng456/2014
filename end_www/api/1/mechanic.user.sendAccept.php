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
	die_json_msg('parameter invalid', 10001);
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('accesstoken  不可用', 10001);
}



$accept_item  = model('mechanic_accept')->add(array('q_id'=>(int)$data['q_id'],'mechanic_user_id'=>(int)$token['owner_id'],'create_time'=>time(),'is_push'=>0));



if (!$accept_item)
{
    die_json_msg('数据更新失败', 10001);
}

json_send(
        array()
);

