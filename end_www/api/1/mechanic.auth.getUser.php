<?php
/**
 * 用户注册，返回token
 * API 1.2
 *
 * @author zhanglipeng 2014.10.17
 */
 
$data = $_POST;

if (!isset($data['phone']) ||!isset($data['role']) || !isset($data['password']) || !isset($data['check_code']))
{
	die_json_msg('参数错误', 10100);
}
if(!preg_match("/1[34578]{1}\d{9}$/",$data['phone']))
{
    die_json_msg('参数错误', 10100);
}
if (!in_array($data['role'],array('driver','mechanic'))){
    die_json_msg('参数错误', 10100);
}

$username = $data['phone'] ;
$password = $data['password'] ;
$check_code = $data['check_code'] ;

$user_insert_data = array();

$user_insert_data['phone'] = $data['phone'];
$user_insert_data['username'] = $data['phone'] ;
$user_insert_data['password'] = $data['password'];


$user_data = model('mechanic_user')->get_one(array('phone'=>$data['phone'])) ;
if ($user_data)
{
	die_json_msg('手机号已被注册',10200) ;
}

//此处验证  验证码
$time = time() ;
$str_sql = "SELECT * FROM end_mechanic_user_checkcode WHERE phone = $data[phone]  and ( status = 'valid' and expires_in > $time ) ";

$checkcode_data = $db->get_all($str_sql) ;

if (!$checkcode_data)
{

	die_json_msg('验证码过期',10201) ;
}
else if (!($checkcode_data[0]['checkcode'] == $data['check_code']))
{
	die_json_msg('验证码错误', 10202) ;
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

if (isset($data['role'])){
    if(!in_array($data['role'],array('driver','mechanic'))){
        die_json_msg('参数错误', 10100);
    }
    $user_insert_data['role'] = $data['role'];
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

if ($data['role'] == "mechanic"){             //技工用户

    $joininfo_id = (int)$data['joininfo_id'];
    $user_insert_data['joininfo_id'] = $joininfo_id;

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

    $array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);

    $register = new Easemob($array);

    $user_id =  end_encode($data['phone']);
    $user_password =  end_encode($data['password']);


    $huanxin_user = array('user'=>$user_id,'password'=>$user_password);

    $reg_user =  $register->accreditRegister($huanxin_user);

    if(!$reg_user['error']){
        die_json_msg('环信用户增加失败', 10101);
    }
    $user_insert_data['huanxin_id'] = $user_id ;
    $user_insert_data['huanxin_password'] = $user_password;

    //添加 用户
    $item_mechanic_user = model('mechanic_user')->add($user_insert_data);
    if (!$item_mechanic_user)
    {
        die_json_msg('user表增加失败', 10101);
    }

 //添加专注车型
    if(isset($data['professional_brand'])){
        $professional_brand = array_filter(explode(",", $data['professional_brand']));
        $professional_brand_sql = "insert into end_mechanic_professional_brand(mechanic_id,brand_id,createtime) values";
        $str_arraay = array();

        foreach($professional_brand as $key => $val)
        {
            $str_arraay[$key] ="(".$item_mechanic_user.",".$val.",".$time.")";
        }
        $sql = $professional_brand_sql.implode(",",$str_arraay);
        $professional_brand_items =  $db->query($sql);
        if(!$professional_brand_items){
            die_json_msg('professional_brand表增加失败', 10101);
        }
    }

//添加擅长领域
    if(isset($data['professional_field'])){
        $professional_field = array_filter(explode(",", $data['professional_field']));
        $professional_field_sql = "insert into end_mechanic_professional_field(mechanic_id,field_id,createtime) values";
        $str_arraay = array();
        foreach($professional_field as $key => $val)
        {
            $str_arraay[$key] ="(".$item_mechanic_user.",".$val.",".$time.")";
        }
        $sql = $professional_field_sql.implode(",",$str_arraay);
        $professional_field_items =  $db->query($sql);
        if(!$professional_field_items){
            die_json_msg('professional_field表增加失败', 10101);
        }
    }

  //添加 技工的信息
    $item_mechanic_joininfo = model('mechanic_joininfo')->update($joininfo_id,$joininfo_update_data);
    if (!$item_mechanic_joininfo)
    {
        die_json_msg('joininfo表更新失败', 10101);
    }

    //返回 token
    $db->query("update end_mechanic_token set status='invalid' where token_type='user' and owner_id=$item_mechanic_user and status='valid'");
    //checkcode 失效
    if (!model('mechanic_user_checkcode')->update($checkcode_data[0]['checkcode_id'],array('status'=>'invalid')) )
    {
        die_json_msg('user_checkcode表更新失败',10101) ;
    }

    while (1)
    {
        $new_token = hash_random($data['phone'], 'sha256');
        $token = model('mechanic_token')->get_one(array('token_type'=>'user',
            'owner_id'=>$item_mechanic_user,
            'status'=>'valid',
            'access_token'=>$new_token));
        if (!$token)
        {
            if (!model('mechanic_token')->add(array('access_token'=>$new_token,
                'token_type'=>'user',
                'owner_id'=>$item_mechanic_user,
                'status'=>'valid')))
            {
                die_json_msg('token表增加失败', 10101);
            }
            json_send(array('access_token'=>$new_token,
                'expires_in'=>0));
        }
    }


}else{                                           //普通用户


    $array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);
    $register = new Easemob($array);

    $user_id =  end_encode($data['phone']);
    $user_password =  end_encode($data['password']);
    $huanxin_user = array('username'=>$user_id,'password'=>$user_password);
    $reg_user =  $register->accreditRegister($huanxin_user);

    if($reg_user['error']){
        die_json_msg('环信用户增加失败', 10101);
    }
//    if($reg_user['status'] != 200){
//        error_log($reg_user['error']."\r\n",3,'errors.log');
//        die_json_msg('环信用户增加失败', 10101);
//    }
    $user_insert_data['huanxin_id'] = $user_id ;
    $user_insert_data['huanxin_password'] = $user_password;


    //添加 用户
    $item_mechanic_user = model('mechanic_user')->add($user_insert_data);
    if (!$item_mechanic_user)
    {
        die_json_msg('user表增加失败', 10101);
    }


    //返回 token
    $db->query("update end_mechanic_token set status='invalid' where token_type='user' and owner_id=$item_mechanic_user and status='valid'");

    //checkcode 失效

    if (!model('mechanic_user_checkcode')->update($checkcode_data[0]['checkcode_id'],array('status'=>'invalid')) )
    {
        die_json_msg('user_checkcode表更新失败',10101) ;
    }

    while (1)
    {
        $new_token = hash_random($data['phone'], 'sha256');
        $token = model('mechanic_token')->get_one(array('token_type'=>'user',
            'owner_id'=>$item_mechanic_user,
            'status'=>'valid',
            'access_token'=>$new_token));
        if (!$token)
        {
            if (!model('mechanic_token')->add(array('access_token'=>$new_token,
                'token_type'=>'user',
                'owner_id'=>$item_mechanic_user,
                'status'=>'valid')))
            {
                die_json_msg('token表增加失败', 10101);
            }
            json_send(array('access_token'=>$new_token,
                'expires_in'=>0));
        }
    }

}

