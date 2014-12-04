<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.27
 */
$data = $_POST;

if (!isset($data['access_token']))
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
//判断技师 是否  节假日服务
$availble_time_week = model('mechanic_period')->get_one(array('mechanic_id'=>(int)$token['owner_id']));

for($i =1;$i<8 ; $i++){
    $flag = "week".$i;
    $week_send[] = json_decode($availble_time_week["$flag"]);
}

json_send(array('time_period'=>$week_send,
           'is_readholiday'=>(int)$availble_time_week['is_readholiday'])
        );
