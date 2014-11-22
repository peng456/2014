<?php
/**
 * 获取最近提问列表
 * API 2.9
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['type']) || !isset($data['from']) || !is_numeric($data['from']) )
{
	die_json_msg('参数错误', 10100);
}
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item){
    die_json_msg('access_token不可用',10600);
}
if($data['type'] == 0){


$question_sql = "select question.* from  end_mechanic_question as question inner join end_mechanic_chat_group as chat_group using(q_id) where question.driver_user_id = {$item['owner_id']}  and question.q_status >= 2 and (question.type = 0 or question.type = 1) order by chat_group.q_end_time desc limit {$data['from']},10";
var_dump($question_sql);die();
$question_items = model('mechanic_question')->get_list(array('_custom_sql'=>$question_sql));

$data_send = array();
$count = 0;
foreach ($question_items as $key => $value)
{



    $mechanic_id_item = model('mechanic_driver_mechanic_question')->get_one(array('q_id'=>$value['q_id']));
    if(!$mechanic_id_item) continue;

    $mechanic_item_sql = "select mechanic.user_id,mechanic.huanxin_id,mechanic.avatar,joininfo.name from end_mechanic_user as mechanic inner join end_mechanic_joininfo as joininfo using(joininfo_id) where mechanic.user_id = {$mechanic_id_item['mechanic_id']}";

    $mechanic_item = model('mechanic_user')->get_one(array('_custom_sql'=>$mechanic_item_sql));
   //技师擅长领域
    $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$mechanic_item['user_id']})";
    $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
    if($professional_field_items === null){
        die_json_msg('professional_field表查询失败', 10101);
    }
    $professional_field = array();
    foreach ($professional_field_items as $key => $select_mechanic_id)
    {
        $professional_field[] = $select_mechanic_id['field_name'];

    }
    $pictures = json_decode($value['picture']) ; //解析图片数据
    //获取问题所属类型
    $q_type_firstclass  = model('mechanic_question_type_first')->get_one($value['q_type_firstclass']);
    $q_type_secondclass = model('mechanic_question_type')->get_one($value['q_type_secondclass']);
    //获取车的信息
    $brand_item  =  model('mechanic_car_brand')->get_one($value['brand']);
    $model_item  =  model('mechanic_car_model')->get_one($value['model']);
    $series_item =  model('mechanic_car_series')->get_one($value['series']);

    $data_send[] = array(
        'mechanic_user_id'=>(int)$mechanic_item['user_id'] ,
        'huanxin_id'=>(string)$mechanic_item['huanxin_id'],
        'mechanic_avatar'=>(string)$mechanic_item['avatar'] ,
        'mechanic_name'=>(string)$mechanic_item['name'] ,
        'professional_field'=>$professional_field ,
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

json_send(array('count'=>(int)$count,'data'=>$data_send)) ;

}