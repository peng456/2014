<?php
/**
 * 用户注册
 * api 1.4
 *
 * @author zhanglipeng 2014.10.17
 */
 
$data = $_POST;

if (!isset($data['access_token']) )
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
    'access_token'=>$data['access_token'],
    'status'=>'valid'));
if (!$item){
    die_json_msg('access_token不可用',10600);
}


 $update_token =  $db->query("update end_mechanic_token set status='invalid' where token_type='user' and owner_id={$item['owner_id']} and status='valid'");
   if(!$update_token){
      die_json_msg('token表更新失败',10600);
  }

 $update_user =  $db->query("update end_mechanic_user set status='offline' where user_id={$item['owner_id']} ");
   if(!$update_user){
      die_json_msg('user表更新失败',10600);
  }

json_send();



