<?php
/**
 * 获取车辆品牌logo
 * API 1.15
 *
 * @author zhanglipeng	2014.12.19
 */

$data = $_POST;

if (!isset($data['access_token']) || !isset($data['brand']) || !is_numeric($data['brand']))
{
    die_json_msg('参数错误', 10100);
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user','status'=>'valid','access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}

$item_car_brand  = model('mechanic_car_brand')->get_one($data['brand']);

json_send(array('car_brand_avatar'=>(string)$item_car_brand['brand_avatar']));
