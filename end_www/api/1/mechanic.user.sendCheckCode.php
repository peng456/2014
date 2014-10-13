<?php
/**
 * 发送验证码
 * API 2.1  
 * @author deanmongel	2014.07.18
 */
//include_once(dirname(__FILE__).'/../../extension/sms/SendTemplateSMS.php') ; 

$data = $_POST ;

if (!isset($data['phone'])  )
{	
	#var_dump($data);
	die_json_msg('parameter invalid', 10001);
}

$checkcode = rand(100000,999999) ;

if (!sendTemplateSMS($data['phone'],array($checkcode,'3'),1))
{
	die_json_msg('send sms fail',20100) ;
}

if (!model('mechanic_user_checkcode')->set(array('phone'=>$data['phone'],'checkcode'=>$checkcode,'expires_in'=>time()+3*60,'status'=>'valid'),array('phone'=>$data['phone'])) )
{
	die_json_msg('date base error: set checkcode log fail',10003) ;
}

json_send() ;