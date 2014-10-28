<?php
/**
 * 获取该问题已查看的技师数量
 * API 2.10
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']) || !is_numeric($data['q_id']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$q_data = model('mechanic_question')->get_one(array('q_id'=>$data['q_id']) ) ;
if (!$q_data )
    die_json_msg('问题id无效',20600);

$accept_data = model('mechanic_accept')->get_list(array('q_id'=>$data['q_id']) ) ;
if ($accept_data === NULL)
    die_json_msg('数据库错误',10101);

if(count($accept_data)>=1)
{
	$status = 1 ;
}
else
{
	$status = 0 ;
}

json_send(array('view_count'=>(int)$q_data['view_count'],'status'=>(int)$status) ) ;