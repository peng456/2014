<?php
/**
 * 获取技师详细信息
 * API 2.4
 *
 * @author duyifan	2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) )
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$userdata = model('mechanic_user')->get_one(array('user_id' => $item['owner_id']) ) ;
if (!$userdata){
    die_json_msg('user表无用户数据',10100);
}

$car_data = json_decode($userdata['car']);
$car_data_array = array();
if($car_data->data){
    $i = 0;
    foreach ($car_data->data as $key => $value)
    {
        $brand_data = model('mechanic_car_brand')->get_one((int)$value->brand);
        $series_data = model('mechanic_car_series')->get_one((int)$value->series);
        $model_data = model('mechanic_car_model')->get_one((int)$value->model);
        $car_data_array[$i]['brand'] = (int)$value->brand;
        $car_data_array[$i]['brandname'] = (string)$brand_data['brand_name'];
        $car_data_array[$i]['series'] = (int)$value->series;
        $car_data_array[$i]['seriesname'] = (string)$series_data['series'];
        $car_data_array[$i]['model'] = (int)$value->model;
        $car_data_array[$i]['modelname'] = (string)$model_data['car_model_name'];
        $car_data_array[$i]['year'] = (int)$value->year;
        $i++;
    }
}

$data_user = array();
$data_user['user_id'] = (int)$userdata['user_id'];
$data_user['username'] = (string)$userdata['username'];
$data_user['role'] = (string)$userdata['role'];
$data_user['nickname'] = (string)$userdata['nickname'];
$data_user['firstname'] = (string)$userdata['firstname'];
$data_user['lastname'] = (string)$userdata['lastname'];
$data_user['phone'] = (string)$userdata['phone'];
$data_user['email'] = (string)$userdata['email'];
$data_user['avatar'] = (string)$userdata['avatar'];
$data_user['sex'] = (string)$userdata['sex'];
$data_user['years'] = round((float)((time()-$userdata['years'])/31536000),1);
$data_user['car'] = $car_data_array;
$data_user['joininfo_id'] = (int)$userdata['joininfo_id'];

if($userdata['role'] && $userdata['joininfo_id'] )
{
    $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
    $answer_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_answer WHERE mechanic_user_id = $userdata[user_id]") ;

    if (!$joininfo){
        die_json_msg('user表或joininfo表无技师数据',20100);
    }
    $workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$joininfo['workbrand'])) ;
    $favorite_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_favorite WHERE mechanic_user_id = $userdata[user_id]") ;

    $workcity = model('mechanic_city')->get_one(array('city_id'=>$joininfo['workcity'])) ;
    $workcityname = $workcity['city_name'] ;

    while($workcity['pid'] != 0)
    {
        $workcity = model('mechanic_city')->get_one(array('city_id'=>$workcity['pid'])) ;
        $workcityname = $workcity['city_name'].$workcityname ;
    }

    if (!$workcity || !$workbrand )
    {
        die_json_msg('city表、brand表',20400);
    }

    $data = array(
        'name'=>(string)$joininfo['name'] ,
        'answer_times'=>(int)$answer_times ,
        'stars'=>(int)$joininfo['stars'] ,
        'response_time'=>(int)$joininfo['response_time'] ,
        'reputation'=>(int)$joininfo['reputation'] ,
        'work_year'=>round((float)((time()-$joininfo['work_year'])/31536000),1) ,
        'workbrand'=>(string)$workbrand['brand_name'] ,
        'workcity'=>(string)$workcityname ,
        'workplace'=>(string)$joininfo['workplace'] ,
        'technical_title'=>(string)$joininfo['technical_title'] ,
        'birth_year'=>(int)$joininfo['birth_year'] ,
        'education'=>(string)$joininfo['education'] ,
        'award'=>(string)$joininfo['award'] ,
        'resume'=>(string)$joininfo['resume'] ,
        'favorite_times'=>(int)$favorite_times
    ) ;
    $data_user = array_merge_recursive($data_user,$data);

}

json_send($data_user) ;
