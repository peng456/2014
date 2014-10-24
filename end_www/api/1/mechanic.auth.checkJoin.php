<?php
/**
 * 检查加盟码，返回加盟码对应信息
 * api 1.5
 *
 * @author duyifan	2014.10.14
 */
 
$data = $_POST;

if (!isset($data['join_code']))
{
	die_json_msg('参数错误', 10100);
}

$joincode = $data['join_code'];

$item = model('mechanic_joininfo')->get_one(array('join_code'=>$joincode));
if (!$item)
{
	die_json_msg('加盟码错误', 10500);
}

json_send(array('joininfo_id'=>(int)$item['joininfo_id'],
				'name'=>(string)$item['name'],
				'phone'=>(string)$item['phone']
				));