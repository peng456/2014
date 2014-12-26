<?php
/**
 * 技师获取系统支持的服务
 * API 3.16
 *
 * @author zhanglipeng	2014.12.18
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

$mechanic_item = model('mechanic_user')->get_one(array('user_id'=>$token['owner_id'],'role'=>'mechanic')) ;
if (!$mechanic_item)
{
	die_json_msg('您没有此权限',10010) ;
}

$server_items  = model('mechanic_server')->get_list();

$datasend = array();
foreach($server_items as $key=>$value){
    $datasend[] = array(
        'server_type'=>(int)$value['id'],
        'name'=>$value['name'],
        'price'=>(int)$value['price'],
        'details'=>$value['details'],
    );
}

json_send(array('server'=>$datasend));

