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

$status = 0;
$accept = model('mechanic_accept')->get_one(array('q_id'=>$data['q_id'],'is_push'=>0) ) ;
if($accept)
{
    $status = 1;
}
json_send(array('view_count'=>(int)$q_data['view_count'],'status'=>$status) ) ;

