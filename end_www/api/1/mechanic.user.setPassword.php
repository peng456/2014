<?php
/**
 * 修改和找回密码
 * API 2.11
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['phone']) || !isset($data['newPassword']) || !isset($data['check_code']))
{
	die_json_msg('parameter invalid', 10001);
}

$username = $data['phone'] ;
$password = $data['newPassword'] ;
$check_code = $data['check_code'] ;

//此处添加验证码验证
$time = time() ;
$checkcode_data = $db->get_all("SELECT * FROM end_mechanic_user_checkcode WHERE phone = $data[phone] and ( status = 'valid' and expires_in > $time ) " ) ;
if (!$checkcode_data)
{
	die_json_msg('checkcode time out', 20201) ;
}
else if (!($checkcode_data[0]['checkcode'] === $data['check_code']))
{
	die_json_msg('checkcode error', 20203) ;
}

if (!model('mechanic_user_checkcode')->update($checkcode_data[0]['checkcode_id'],array('status'=>'invalid')) )
{
	die_json_msg('database error: update checkcode log fail',10003) ;
}

$item = model('mechanic_user')->get_one(array('username'=>$username,'phone'=>$username));
$result = model('mechanic_user')->update($item['user_id'],array('password'=>$password));
if (!$result)
{
	die_json_msg('database error: add user error', 10003);
}

json_send() ;
