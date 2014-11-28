<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.27
 */
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['time_period'])||!isset($data['is_readholiday']) || !in_array($data['is_readholiday'],array(0,1 )))
{
	die_json_msg('参数错误', 10100);
}

$time_period = json_decode($data['time_period']);
if($time_period == null){
    die_json_msg('time_period参数json格式错误', 10100);
}


//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}

$mechanic_item = model('mechanic_user')->get_one($token['owner_id']);
if($mechanic_item['role'] != 'mechanic'){
    die_json_msg('没有此权限', 10100);
}

$data_insert = array();

$data_insert['mechanic_id']     =  $token['owner_id'];
$data_insert['is_readholiday']  =  $data['is_readholiday'];
$data_insert['create_time']     =  time();

   foreach($time_period as $key=>$value){
       $flag = "week".($key+1);
       $data_insert["$flag"] = json_encode($value);
   }

 $period_item  = model('mechanic_period')->set($data_insert,array('mechanic_id'=> $token['owner_id']));

if(!$period_item){
        die_json_msg('period表添加失败', 10101);
    }

    json_send();
