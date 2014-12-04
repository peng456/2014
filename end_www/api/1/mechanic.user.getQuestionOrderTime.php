<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.27
 */
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['q_id']))
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
 $sql = "select record.* from end_mechanic_period_record as record inner join end_mechanic_question as question on question.period_record_id = record.id where question.q_id = {$data['q_id']} and record.status = 1 ";
 $period_record_item  = model('mechanic_period_record')->get_one(array('_custom_sql'=>$sql));

if(!$period_record_item){
        die_json_msg('period表查询失败', 10101);
    }
$time = ((int)$period_record_item['date'])*86400;
    json_send(array('time'=>$time,'time_period'=>(int)$period_record_item['time_period']));
