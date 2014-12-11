<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.27
 */
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['mechanic_id'])||!isset($data['time'])||!isset($data['time_period'])||!isset($data['time_period']))
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
$date = (int)($data['time']/86400);
$time = (int)time();
$period_item =model('mechanic_period_record')->get_one(array('mechanic_id'=>$data['mechanic_id'],'date'=>$date,'time_period'=>$data['time_period'],'where'=>"($time < deadline or status = 1) and driver_id != {$token['owner_id']}"));
if($period_item){
    die_json_msg('此时间段已被预约', 10100);
}
$data_insert = array();
$date = (int)($data['time']/86400);
$data_insert['mechanic_id']  =  $data['mechanic_id'];
$data_insert['driver_id']  =  $token['owner_id'];
$data_insert['date']  = $date ;
$data_insert['time_period']  =  $data['time_period'];
$data_insert['status']   =  0;
$data_insert['deadline'] =  $time + 600;
$data_insert['create_time']  =  $time;

$period_record_item  = model('mechanic_period_record')->set($data_insert,array('mechanic_id'=>$data['mechanic_id'],'driver_id'=>$token['owner_id'],'date'=>$date,'time_period'=>$data['time_period']));

if(!$period_record_item){
        die_json_msg('period_record表添加失败', 10101);
    }

json_send(array('period_record_id'=>(int)$period_record_item));
