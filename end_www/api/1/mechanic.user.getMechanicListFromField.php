<?php
/**
 * 获取技师,通过专长          ||          智能排序
 * @author           zhanglipeng 2014.11.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['from'])|| !isset($data['professional_field']))
{
	die_json_msg('参数错误', 10100);
}
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item){
    die_json_msg('access_token不可用',10600);
}

 if($data['professional_field'] != 0){   //按专长      排序

    if(!is_numeric($data['professional_field'])){
            die_json_msg('参数错误', 10100);
        }

    $select_mechanic_id_sql = "select mechanic_id from end_mechanic_professional_field where field_id = {$data['professional_field']} limit {$data['from']},10";
    $select_mechanic_id_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$select_mechanic_id_sql));

    $count_mechanic = 0;
    $data_send = array();
    foreach ($select_mechanic_id_items as $key =>$select_mechanic_id)
    {
        //获取技师基本信息
        $select_mechanic_sql = "select mechanic.user_id , mechanic.avatar,joininfo.name,joininfo.stars,joininfo.technical_title,joininfo.workbrand ,joininfo.reputation from end_mechanic_user as mechanic inner join end_mechanic_joininfo as joininfo using(joininfo_id) where mechanic.user_id = {$select_mechanic_id['mechanic_id']}";
        $mechanic_item = model('mechanic_user')->get_one(array('_custom_sql'=>$select_mechanic_sql));
        if(!$mechanic_item )  continue;
        //获取 技师 擅长领域

        $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$select_mechanic_id['mechanic_id']})";
        $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
        if($professional_field_items === null){
            die_json_msg('professional_field表查询失败', 10101);
        }
        $professional_field = array();
        foreach ($professional_field_items as $key => $value_field)
        {
            $professional_field[] = $value_field['field_name'];

        }
        //获取 技师 专注车型
        $professional_brand_sql = "select brand_name from end_mechanic_car_brand where car_brand_id in(select brand_id from end_mechanic_professional_brand where mechanic_id ={$select_mechanic_id['mechanic_id']})";
        $professional_brand_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_brand_sql));
        if($professional_brand_items === null){
            die_json_msg('professional_brand表查询失败', 10101);
        }
        $professional_brand = array();
        foreach ($professional_brand_items as $key_brand => $value_brand)
        {
            $professional_brand[$key_brand] = $value_brand['brand_name'];
        }
        $workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$mechanic_item['workbrand'])) ;

        $data_send[] = array(
            'id'=>(int)$mechanic_item['user_id'],
            'avatar'=>$mechanic_item['avatar'],
            'name'=>$mechanic_item['name'],
            'stars'=>(int)$mechanic_item['stars'],
            'technical_title'=>(string)$mechanic_item['technical_title'],
            'workbrand'=>$workbrand['brand_name'],
            'reputation'=>(int)$mechanic_item['reputation'],
            'professional_field'=>$professional_field,
            'professional_brand'=>$professional_brand
        );
        $count_mechanic++;
    }
    json_send(array('count'=>$count_mechanic,'data'=>$data_send));

    }
 else{   // 全部匹配

     $select_mechanic_sql = "select mechanic.user_id , mechanic.avatar,joininfo.name,joininfo.stars,joininfo.technical_title,joininfo.workbrand ,joininfo.reputation from end_mechanic_user as mechanic inner join end_mechanic_joininfo as joininfo using(joininfo_id) where mechanic.role = 'mechanic' limit {$data['from']},10";
     $mechanic_items = model('mechanic_user')->get_list(array('_custom_sql'=>$select_mechanic_sql));
     $data_send = array();
     $count_mechanic = 0;
     foreach ($mechanic_items as $key =>$select_mechanic_id)
     {

         //获取 技师 擅长领域
         $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$select_mechanic_id['user_id']})";
         $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
         $count_mechanic = 0;
         if($professional_field_items === null){
             die_json_msg('professional_field表查询失败', 10101);
         }
         $professional_field = array();
         foreach ($professional_field_items as $key => $value_field)
         {
             $professional_field[] = $value_field['field_name'];

         }
         //获取 技师 专注车型
         $professional_brand_sql = "select brand_name from end_mechanic_car_brand where car_brand_id in(select brand_id from end_mechanic_professional_brand where mechanic_id = {$select_mechanic_id['user_id']})";
         $professional_brand_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_brand_sql));
         if($professional_brand_items === null){
             die_json_msg('professional_brand表查询失败', 10101);
         }
         $professional_brand = array();
         foreach ($professional_brand_items as $key_brand => $value_brand)
         {
             $professional_brand[$key_brand] = $value_brand['brand_name'];
         }
         $workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$select_mechanic_id['workbrand'])) ;
         $data_send[] = array(
             'id'=>(int)$select_mechanic_id['user_id'],
             'avatar'=>$select_mechanic_id['avatar'],
             'name'=>$select_mechanic_id['name'],
             'stars'=>(int)$select_mechanic_id['stars'],
             'technical_title'=>(string)$select_mechanic_id['technical_title'],
             'workbrand'=>$workbrand['brand_name'],
             'reputation'=>(int)$select_mechanic_id['reputation'],
             'professional_field'=>$professional_field,
             'professional_brand'=>$professional_brand
         );
         $count_mechanic++;
     }
     json_send(array('count'=>$count_mechanic,'data'=>$data_send));

 }