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

$q_data = model('mechanic_question')->get_one(array('q_id'=>(int)$data['q_id'])) ;

if (!$q_data)
        die_json_msg('question表获取信息失败',10101);
    
if ($q_data['q_status'] == 1)
{
	$res = model('mechanic_question')->update((int)$data['q_id'],array('q_status'=>2 )) ;
	if (!$res)
    	die_json_msg('question表更新q_status失败',10101);
}

json_send(
        array()
);

