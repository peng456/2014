<?php
/**
 * OBD upload error data 
 * @author deanmongel  2014.06.09
 */

//读取数据
$data = json_receive(); 

//基本错误判断
if (count($data) < 3) 
	die_json_msg('parameter invalid', 10200);

//找到token对应的设备id	
$item = model('vanet_token')->get_one(array('token_type'=>'obd',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid');

unset($data['access_token']);
$data['nobd_id'] = $item['owner_id'];

switch ($data['error_type']) {
	case 10:
		$data['error_msg'] = 'obd串口连接失败' ;
		break;
	case 11:
		$data['error_msg'] = 'obd初始化失败' ;
		break;
	case 12:
		$data['error_msg'] = 'obd采集数据失败' ;
		break;
	case 20:
		$data['error_msg'] = 'gps串口连接失败' ;
		break;
	case 21:
		$data['error_msg'] = 'gps数据丢失' ;
		break;
	case 22:
		$data['error_msg'] = 'gps数据无效' ;
		break;
	default:
		# code...
		break;
}

//调用add方法将数据添加进数据库
if (!model('vanet_errordata')->add($data))
	die_json_msg('db fail');
	
json_send();