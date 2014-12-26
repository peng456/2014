<?php
/**
 * 更新用户信息
 * API 1.12
 *
 * @author zhanglipeng 2014.12.17
 */
 
$data = $_POST;

if (!isset($data['access_token']))
{
	die_json_msg('参数错误', 10100);
}

//判断accesstoken
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
    'access_token'=>$data['access_token'],
    'status'=>'valid'));

if (!$item){
    die_json_msg('access_token不可用',10600);
}

$user_insert_data = array();
if(isset($data['phone'])){
    if(!preg_match("/1[34578]{1}\d{9}$/",$data['phone']))
    {
        die_json_msg('参数错误', 10100);
    }
    $user_insert_data['phone'] = $data['phone'];
    $user_insert_data['username'] = $data['phone'];
    $user_data_phone = model('mechanic_user')->get_one(array('phone'=>$data['phone'])) ;
    if ($user_data_phone)
    {
        die_json_msg('手机号已被注册',10200) ;
    }
}

//如果参数存在，则放入要加入数据库的数组中

if (isset($data['avatar'])){
    $user_insert_data['avatar'] = $data['avatar'];
}

if (isset($data['nickname'])){
    $user_insert_data['nickname'] = $data['nickname'];
}
if (isset($data['lastname'])){
    $user_insert_data['lastname'] = $data['lastname'];
}
if (isset($data['firstname'])){
    $user_insert_data['firstname'] = $data['firstname'];
}


if (isset($data['sex'])){
    if (!in_array($data['sex'],array('m','fm'))){
        die_json_msg('参数错误', 10100);
    }

    $user_insert_data['sex'] = $data['sex'];
}

if (isset($data['years'])){
      if(!is_numeric($data['years']))
      {
          die_json_msg('参数错误', 10100);
      }
    $user_insert_data['years'] = time()-3600*24*365*$data['years'];
}

if (isset($data['car'])){
    $user_insert_data['car'] = $data['car'];
}

$user_data = model('mechanic_user')->get_one($item['owner_id']) ;
if (!$user_data)
{
    die_json_msg('user表查询失败',10101) ;
}

if ($user_data['role'] == "mechanic"){             //技师用户

    $joininfo_id = (int)$user_data['joininfo_id'];

    $joininfo_update_data = array();

    if(isset( $data['work_year']))
    {
        if(!is_numeric($data['work_year']))
        {
            die_json_msg('参数错误', 10100);
        }
        $joininfo_update_data['work_year'] = time()-3600*24*365*$data['work_year'];
    }

    if(isset( $data['workbrand']))
    {
        $joininfo_update_data['workbrand'] = $data['workbrand'];
    }
    if(isset( $data['phone']))
    {
        $joininfo_update_data['phone'] = $data['phone'];
    }

    if(isset( $data['name']))
    {
        $joininfo_update_data['name'] = $data['name'];
    }

    if(isset( $data['workcity']))
    {
        $joininfo_update_data['workcity'] = $data['workcity'];
    }

    if(isset( $data['workplace']))
    {
        $joininfo_update_data['workplace'] = $data['workplace'];
    }

    if(isset( $data['technical_title']))
    {
        $joininfo_update_data['technical_title'] = $data['technical_title'];
    }

    if(isset( $data['birth_year']))
    {
        $joininfo_update_data['birth_year'] = $data['birth_year'];
    }

    if(isset( $data['education']))
    {
        $joininfo_update_data['education'] = $data['education'];
    }

    if(isset( $data['award']))
    {
        $joininfo_update_data['award'] = $data['award'];
    }

    if(isset( $data['resume']))
    {
        $joininfo_update_data['resume'] = $data['resume'];
    }

       //更新 用户基本信息
    $item_mechanic_user = model('mechanic_user')->update($user_data['user_id'],$user_insert_data);
    if (!$item_mechanic_user)
    {
        die_json_msg('user表更新失败', 10101);
    }

 //添加专注车型
    if(isset($data['professional_brand'])){
       //删除专注车型
        $delete_brand_sql = "DELETE FROM end_mechanic_professional_brand WHERE mechanic_id = {$user_data['user_id']}";
        $delete_item = $db->query($delete_brand_sql);
        if(!$delete_item){
            die_json_msg('professional_brand表删除失败', 10101);
        }

        $professional_brand = array_filter(explode(",", $data['professional_brand']));
        $professional_brand_sql = "insert into end_mechanic_professional_brand(mechanic_id,brand_id,createtime) values";
        $str_arraay = array();
        $time = time();
        foreach($professional_brand as $key => $val)
        {
            $str_arraay[$key] ="(".$user_data['user_id'].",".$val.",".$time.")";
        }
        $sql = $professional_brand_sql.implode(",",$str_arraay);
        $professional_brand_items =  $db->query($sql);
        if(!$professional_brand_items){
            die_json_msg('professional_brand表增加失败', 10101);
        }
    }

//添加擅长领域
    if(isset($data['professional_field'])){
        //删除擅长领域
        $delete_field_sql = "DELETE FROM end_mechanic_professional_field WHERE mechanic_id = {$user_data['user_id']}";
        $delete_item = $db->query($delete_field_sql);
        if(!$delete_item){
            die_json_msg('professional_field表删除失败', 10101);
        }
        $professional_field = array_filter(explode(",", $data['professional_field']));
        $professional_field_sql = "insert into end_mechanic_professional_field(mechanic_id,field_id,createtime) values";
        $str_arraay = array();
        $time = time();
        foreach($professional_field as $key => $val)
        {
            $str_arraay[$key] ="(".$user_data['user_id'].",".$val.",".$time.")";
        }
        $sql = $professional_field_sql.implode(",",$str_arraay);
        $professional_field_items =  $db->query($sql);
        if(!$professional_field_items){
            die_json_msg('professional_field表增加失败', 10101);
        }
    }

  //更新 技工的信息
    $item_mechanic_joininfo = model('mechanic_joininfo')->update($joininfo_id,$joininfo_update_data);
    if (!$item_mechanic_joininfo)
    {
        die_json_msg('joininfo表更新失败', 10101);
    }
    $user_item_sql = "select user.user_id,user.username,user.role,user.phone as userphone,user.avatar,user.sex,user.years,joininfo.* from end_mechanic_user as user inner join end_mechanic_joininfo as joininfo using(joininfo_id) where user.user_id = {$user_data['user_id']}";
    $user_item     = model('mechanic_user')->get_one(array('_custom_sql'=>$user_item_sql));

    $workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$user_item['workbrand'])) ;

    $workcity = model('mechanic_city')->get_one(array('city_id'=>$user_item['workcity'])) ;
    $workcityname = $workcity['city_name'];
    while($workcity['pid'] != 0)
    {
        $workcity = model('mechanic_city')->get_one(array('city_id'=>$workcity['pid'])) ;
        $workcityname = $workcity['city_name'].$workcityname ;
    }

    //获取 技师 擅长领域
    $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$user_data['user_id']})";
    $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
    if($professional_field_items === null){
        die_json_msg('professional_field表查询失败', 10101);
    }
    $professional_field = array();
    foreach ($professional_field_items as $key_field => $value_field)
    {
        $professional_field[$key_field] = $value_field['field_name'];

    }

    //获取 技师 专注车型
    $professional_brand_sql = "select brand_name from end_mechanic_car_brand where car_brand_id in(select brand_id from end_mechanic_professional_brand where mechanic_id = {$user_data['user_id']})";
    $professional_brand_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_brand_sql));
    if($professional_brand_items === null){
        die_json_msg('professional_brand表查询失败', 10101);
    }
    $professional_brand = array();
    foreach ($professional_brand_items as $key_brand => $value_brand)
    {
        $professional_brand[$key_brand] = $value_brand['brand_name'];
    }


    json_send(
        array(
            'user_id'=>(int)$user_item['user_id'],
            'username'=>(string)$user_item['username'],
            'nickname'=>(string)$user_item['nickname'],
            'role'=>(string)$user_item['role'],
            'phone'=>(string)$user_item['userphone'],
            'email'=>(string)$user_item['email'],
            'avatar'=>(string)$user_item['avatar'],
            'sex'=>(string)$user_item['sex'],
            'years'=>round((float)((time()-$user_item['years'])/31536000),1),
            'joininfo_id'=>(int)$user_item['joininfo_id'] ,
            'name'=>(string)$user_item['name'] ,
            'stars'=>(int)$user_item['stars'] ,
            'response_time'=>(int)$user_item['response_time'] ,
            'reputation'=>(int)$user_item['reputation'] ,
            'work_year'=>round((float)((time()-$user_item['work_year'])/31536000),1) ,
            'workbrand'=>(string)$workbrand['brand_name'] ,
            'professional_brand'=>$professional_brand,
            'professional_field'=>$professional_field,
            'workcity'=>(string)$workcityname ,
            'workplace'=>(string)$user_item['workplace'] ,
            'technical_title'=>(string)$user_item['technical_title'] ,
            'birth_year'=>(int)$user_item['birth_year'] ,
            'education'=>(string)$user_item['education'] ,
            'award'=>(string)$user_item['award'] ,
            'resume'=>(string)$user_item['resume']
        )
    );

}
else{                                           //普通用户
//    $array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);
//    $register = new Easemob($array);
//
//    $user_id =  end_encode($data['phone']);
//    $user_password =  end_encode($data['password']);
//    $huanxin_user = array('username'=>$user_id,'password'=>$user_password);
//    $reg_user =  $register->accreditRegister($huanxin_user);
//
//    if($reg_user['error']){
//        die_json_msg('环信用户增加失败', 10101);
//    }
//    $user_insert_data['huanxin_id'] = $user_id ;
//    $user_insert_data['huanxin_password'] = $user_password;

    //更新 用户
    $item_mechanic_user = model('mechanic_user')->update($user_data['user_id'],$user_insert_data);
    if (!$item_mechanic_user)
    {
        die_json_msg('user表更新失败', 10101);
    }

    $user_item = model('mechanic_user')->get_one($user_data['user_id']);


    $car_data = json_decode($user_item['car']);
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

    json_send( array(
        'user_id'=>(int)$user_item['user_id'],
        'username'=>(string)$user_item['username'],
        'nickname'=>(string)$user_item['nickname'],
        'role'=>(string)$user_item['role'],
        'firstname'=>(string)$user_item['firstname'],
        'lastname'=>(string)$user_item['lastname'],
        'phone'=>(string)$user_item['phone'],
        'email'=>(string)$user_item['email'],
        'avatar'=>(string)$user_item['avatar'],
        'sex'=>(string)$user_item['sex'],
        'years'=>round((float)((time()-$user_item['years'])/31536000),1),
        'car'=>$car_data_array
        )
    );

}

