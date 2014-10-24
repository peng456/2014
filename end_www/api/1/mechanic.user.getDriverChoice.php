<?php
/**
 * 询问回答状态
 * API 3.3
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']) || !is_numeric($data['q_id']))
{
	die_json_msg('parameter invalid', 10001);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('token invalid',10000);

$mechanic_user_id = $item['owner_id'] ;

$q_data = model('mechanic_question')->get_one(array('q_id'=>$data['q_id']) ) ;
if (!$q_data )
    die_json_msg('问题id无效',00000);

if ($q_data['is_accept'] == 0)
{
	json_send(array('response'=>0)) ;
}
else
{
	$is_select = model('mechanic_question_mechanic')->get_one(array('q_id'=>$data['q_id'],'mechanic_user_id'=>$mechanic_user_id)) ;
	if ($is_select)
	{
		json_send(array('response'=>1)) ;
	}
	else
	{
		json_send(array('response'=>2)) ;
	}
}