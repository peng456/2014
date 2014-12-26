<?php
/**
 * 技师设置服务
 * API 3.18
 *
 * @author zhanglipeng	2014.12.18
 */
 
$data = $_POST;

if (!isset($data['server_type']) || !is_numeric($data['server_type']) || !in_array($data['server_type'],array(0,1,2,3))|| !isset($data['access_token']) || !isset($data['operate']) || !is_numeric($data['operate']) || !in_array($data['operate'],array(0,1)))
{
	die_json_msg('参数错误', 10100);
}

$data_tosql = array();
if($data['operate'] == 0){
    if (!isset($data['price']) || !isset($data['status']) || !is_numeric($data['status'])|| !in_array($data['status'],array(0,1)))
    {
        die_json_msg('参数错误', 10100);
    }
    $data_tosql['createtime'] = time();
}
//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user','status'=>'valid','access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}

$mechanic_item = model('mechanic_user')->get_one(array('user_id'=>$token['owner_id'],'role'=>'mechanic')) ;
if (!$mechanic_item)
{
    die_json_msg('您没有此权限',10010) ;
}


$data_tosql['mechanic_id'] = $token['owner_id'];
$data_tosql['server_id'] = $data['server_type'];

if(isset($data['price'])){
    $data_tosql['price'] = $data['price'];
}

if(isset($data['status'])){
    $data_tosql['status'] = $data['status'];
}


$item_server = model('mechanic_server_mechanic')->set($data_tosql,array('mechanic_id'=>$token['owner_id'],'server_id'=>$data['server_type']));

if (!$item_server)
{
	die_json_msg('server_mechanic表更新失败', 10101);
}
json_send() ;
