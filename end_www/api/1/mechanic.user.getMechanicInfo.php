<?php
/**
 * 获取技师详细信息
 * API 2.4
 *
 * @author duyifan	2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['mechanic_id']) || !is_numeric($data['mechanic_id']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$month_ago_time = time() - 30*24*3600 ;

$userdata = model('mechanic_user')->get_one(array('user_id' => $data['mechanic_id']) ) ;
$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
$answer_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_answer WHERE mechanic_user_id = $userdata[user_id] AND create_time > $month_ago_time ") ;

if (!$joininfo || !$userdata || $answer_times === NULL )
    die_json_msg('user表或joininfo表无技师数据',20100);

$workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$joininfo['workbrand'])) ;
$favorite_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_favorite WHERE mechanic_user_id = $userdata[user_id]") ;

$workcity = model('mechanic_city')->get_one(array('city_id'=>$joininfo['workcity'])) ;
$workcityname = $workcity['city_name'] ;

while($workcity['pid'] != 0)
{
	$workcity = model('mechanic_city')->get_one(array('city_id'=>$workcity['pid'])) ;
	$workcityname = $workcity['city_name'].$workcityname ;
}
 $workplacename = model('mechanic_garage')->get_one($joininfo['workplace']);

if (!$workcity || !$workbrand || !$workplacename )
    die_json_msg('city表、brand表、garage表信息获取失败',20400);

 $is_favorite = model('mechanic_favorite')->get_one(array('driver_user_id'=>$item['owner_id'],'mechanic_user_id'=>$data['mechanic_id'],'status'=>1));

 $data = array(
		'id'=>(int)$userdata['user_id'] ,
		'name'=>(string)$joininfo['name'] ,
		'avatar'=>(string)$userdata['avatar'] ,
		'answer_times'=>(int)$answer_times ,
		'stars'=>(int)$joininfo['stars'] ,
		'response_time'=>(int)$joininfo['response_time'] ,
		'reputation'=>(int)$joininfo['reputation'] ,
		'work_year'=>(int)$joininfo['work_year'] ,
		'workbrand'=>(string)$workbrand['brand_name'] ,
		'workcity'=>(string)$workcityname ,
		'workplace'=>(string)$workplacename['garage_name'] ,
		'technical_title'=>(string)$joininfo['technical_title'] ,
		'birth_year'=>(int)$joininfo['birth_year'] ,
		'education'=>(string)$joininfo['education'] ,
		'award'=>(string)$joininfo['award'] ,
		'resume'=>(string)$joininfo['resume'] ,
		'favorite_times'=>(int)$favorite_times ,
		'is_favorite'=>(int)$is_favorite ,
		) ;

$res = model('mechanic_view')->add(array(
	'driver_user_id'=>$item['owner_id'] ,
	'mechanic_user_id'=>$userdata['user_id'] ,
	'is_push'=>0,
	'create_time'=>time() ,
	)) ;
if (!$res)
    die_json_msg('view表更新失败',1000);

json_send($data) ;
