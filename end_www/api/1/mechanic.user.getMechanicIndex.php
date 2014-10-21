<?php
/**
 * 获取技师主页信息
 * API 3.1
 *
 * @author duyifan	2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['from']))
{
	die_json_msg('parameter invalid', 10001);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('token invalid',10000);

$mechanic_user_id = $item['owner_id'] ;
$userdata = model('mechanic_user')->get_one(array('user_id' => $mechanic_user_id) ) ;
$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;

if (!$joininfo || !$userdata )
    die_json_msg('database error',10003);

$todayfromtime  = mktime(0,0,0,date('m'),date('d'),date('Y'));
$todayendtime   = $todayfromtime + 24*3600 ;
$noticefromtime = mktime(0,0,0,date('m'),date('d')-$data['from'],date('Y'));
$noticeendtime  = $todayfromtime + 24*3600 ;

$view_count     = get_query_item_count("SELECT * FROM end_mechanic_view WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $todayfromtime AND create_time < $todayendtime ) ") ;
$good_count     = get_query_item_count("SELECT * FROM end_mechanic_good WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $todayfromtime AND create_time < $todayendtime ) ") ;
$favorite_count = get_query_item_count("SELECT * FROM end_mechanic_favorite WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $todayfromtime AND create_time < $todayendtime ) ") ;
$answer_count   = get_query_item_count("SELECT * FROM end_mechanic_answer WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $todayfromtime AND create_time < $todayendtime ) ") ;
$answer_bonus   = $db->get_one("SELECT SUM(pay_amount) FROM end_mechanic_answer WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $todayfromtime AND create_time < $todayendtime ) ") ;

$notice_count = 0 ;
$notice_data  = array() ;

$view_data = $db->get_all("SELECT * FROM end_mechanic_view WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $noticefromtime AND create_time < $noticeendtime ) ") ;
foreach ($view_data as $key => $value) 
{
	$driverdata = model('mechanic_user')->get_one(array('user_id' => $value['driver_user_id']) ) ;
	$notice_data[] = array(
		'user_id'=>(int)$driverdata['user_id'] ,
		'nickname'=>(string)$driverdata['nickname'] ,
		'avatar'=>(string)$driverdata['avatar'] ,
		'type'=>"view",
		'time'=>(int)$value['create_time'] ,
		) ;
}

$good_data = $db->get_all("SELECT * FROM end_mechanic_good WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $noticefromtime AND create_time < $noticeendtime ) ") ;
foreach ($good_data as $key => $value) 
{
	$driverdata = model('mechanic_user')->get_one(array('user_id' => $value['driver_user_id']) ) ;
	$notice_data[] = array(
		'user_id'=>(int)$driverdata['user_id'] ,
		'nickname'=>(string)$driverdata['nickname'] ,
		'avatar'=>(string)$driverdata['avatar'] ,
		'type'=>"good",
		'time'=>(int)$value['create_time'] ,
		'a_id'=>(int)$value['a_id'] ,
		) ;
}

$favorite_data = $db->get_all("SELECT * FROM end_mechanic_favorite WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >= $noticefromtime AND create_time < $noticeendtime ) ") ;
foreach ($favorite_data as $key => $value) 
{
	$driverdata = model('mechanic_user')->get_one(array('user_id' => $value['driver_user_id']) ) ;
	$notice_data[] = array(
		'user_id'=>(int)$driverdata['user_id'] ,
		'nickname'=>(string)$driverdata['nickname'] ,
		'avatar'=>(string)$driverdata['avatar'] ,
		'type'=>"favorite",
		'time'=>(int)$value['create_time'] ,
		) ;
}

$payment_data = $db->get_all("SELECT * FROM end_mechanic_answer WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >== $noticefromtime AND create_time < $noticeendtime ) ") ;
foreach ($payment_data as $key => $value) 
{
	$q_data = model('mechanic_question')->get_one(array('q_id'=>$value['q_id'])) ;
	$driver_user_id = $q_data['driver_user_id'] ;
	$driverdata = model('mechanic_user')->get_one(array('user_id' => $driver_user_id) ) ;
	$notice_data[] = array(
		'user_id'=>(int)$driverdata['user_id'] ,
		'nickname'=>(string)$driverdata['nickname'] ,
		'avatar'=>(string)$driverdata['avatar'] ,
		'type'=>"payment",
		'amount'=>(float)$value['pay_amount'] ,
		'time'=>(int)$value['create_time'] ,
		) ;
}

$answer_data = $db->get_all("SELECT * FROM end_mechanic_question_mechanic WHERE mechanic_user_id = $mechanic_user_id AND ( create_time >== $noticefromtime AND create_time < $noticeendtime ) ") ;
foreach ($answer_data as $key => $value) 
{
	$q_data = model('mechanic_question')->get_one(array('q_id'=>$value['q_id'])) ;
	$driver_user_id = $q_data['driver_user_id'] ;
	$driverdata = model('mechanic_user')->get_one(array('user_id' => $driver_user_id) ) ;
	$notice_data[] = array(
		'user_id'=>(int)$driverdata['user_id'] ,
		'nickname'=>(string)$driverdata['nickname'] ,
		'avatar'=>(string)$driverdata['avatar'] ,
		'type'=>"answer",
		'time'=>(int)$value['create_time'] ,
		'q_id'=>(float)$value['q_id'] ,
		) ;
}

usort($notice, function($a, $b) {
            $al = strlen($a['create_time']);
            $bl = strlen($b['create_time']);
            if ($al == $bl)
                return 0;
            return ($al > $bl) ? -1 : 1;
        });

$data = array(
		'id'=>(int)$userdata['user_id'] ,
		'name'=>(string)$joininfo['name'] ,
		'avatar'=>(string)$userdata['avatar'] ,
		'view_count'=>(int)$view_count ,
		'answer_count'=>(int)$answer_count ,
		'good_count'=>(int)$good_count ,
		'favorite_count'=>(int)$favorite_count ,
		'answer_bonus'=>(int)$answer_bonus ,
		'notice_count'=>(int)$notice_count ,
		'notice'=>$notice ,
		) ;

json_send($data) ;
