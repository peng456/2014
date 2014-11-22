<?php
/**
 * 获取最近提问列表
 * API 3.5
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['type']) || !isset($data['from']) || !is_numeric($data['from']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$from = $data['from'] ;
$mechanic_user_id = $item['owner_id'] ;
$count = 0 ;
$data_send = array() ;
if($data['type'] == 0){
$question_sql = "select question.* from end_mechanic_question as question inner join  end_mechanic_driver_mechanic_question as d_m_q using(q_id)   where d_m_q.mechanic_id  = {$mechanic_user_id} and (question.type = 0 or question.type = 1) order by question.create_time DESC limit {$from},10";

$question_items = model('mechanic_question')->get_list(array('_custom_sql'=>$question_sql));

foreach ($question_items as $key => $value)
{
    $driver_item = model('mechanic_user')->get_one($value['driver_user_id']);
    if(!$driver_item)continue;
    $pictures = json_decode($value['picture']) ;
    $q_type_firstclass  = model('mechanic_question_type_first')->get_one($value['q_type_firstclass']);
    $q_type_secondclass = model('mechanic_question_type')->get_one($value['q_type_secondclass']);

    $brand_item  =  model('mechanic_car_brand')->get_one($value['brand']);
    $model_item  =  model('mechanic_car_model')->get_one($value['model']);
    $series_item =  model('mechanic_car_series')->get_one($value['series']);

    $data_send[] = array(
        'driver_user_id'=>(int)$driver_item['user_id'] ,
        'huanxin_id'=>(string)$driver_item['huanxin_id'],
        'driver_avatar'=>(string)$driver_item['avatar'] ,
        'nickname'=>(string)$driver_item['nickname'] ,
        'q_id'=>(int)$value['q_id'] ,
        'type'=>(int)$value['type'] ,
        'q_type_firstclass'=>(string)$q_type_firstclass['content'],
        'q_type_secondclass'=>(string)$q_type_secondclass['content'],
        'text'=>(string)$value['text'] ,
        'pic_data'=>$pictures ,
        'car_brand'=>(string)$brand_item['brand_name'] ,
        'car_brand_avatar'=>(string)$brand_item['brand_avatar'],
        'car_series'=>(string)$series_item['series'],
        'car_model'=>(string)$model_item['car_model_name'],
        'car_years'=>(int)$value['year'],
        'q_status'=>(int)$value['q_status'],
        'time'=>(int)$value['create_time']
    ) ;
    $count++;
}
json_send(array('count'=>(int)$count,'data'=>$data_send) ) ;
}
die_json_msg('type参数错误', 10100);
