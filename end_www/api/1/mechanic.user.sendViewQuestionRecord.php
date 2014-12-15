<?php
/**
 * 检查加盟码，返回加盟码对应信息
 * api 1.5
 *
 * @author duyifan	2014.10.14
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['q_id']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
    'access_token'=>$data['access_token'],
    'status'=>'valid'));

if (!$item){
    die_json_msg('access_token不可用',10600);
}

model('mechanic_question')->update($data['q_id'],array(''));
