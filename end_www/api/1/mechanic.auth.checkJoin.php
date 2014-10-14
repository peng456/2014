<?php
/**
 * 检查加盟码，返回加盟码对应信息
 *
 * @author duyifan	2014.10.14
 */
 
$data = $_POST;

if (!isset($data['join_code']))
{
	die_json_msg('parameter invalid', 10001);
}

$joincode = $data['join_code'];

$item = model('mechanic_joininfo')->get_one(array('join_code'=>$joincode));
if (!$item)
{
	die_json_msg('parameter value error: joincode miss match', 10002);
}

json_send(array('joininfo_id'=>$item['joininfo_id'],
				'name'=>$item['name'],
				'stars'=>$item['stars'],
				'work_year'=>$item['work_year'],
				'award'=>$item['award'],
				'workplace'=>$item['workplace'],
				'resume'=>$item['resume']
						));	