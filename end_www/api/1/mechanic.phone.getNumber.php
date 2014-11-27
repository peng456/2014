<?php

$data = $_POST;

if(!isset($data['customerNumber']) || !isset($data['access_token']))
{
    die_json_msg('参数错误', 10100);
}

if(isset($data['access_token'])){
    //判断accesstoken        是否过期
    $token = model('mechanic_token')->get_one(array('token_type'=>'user',
        'status'=>'valid',
        'access_token'=>$data['access_token']));

    if (!$token)
    {
        die_json_msg('access_token不可用', 10600);
    }
}

$res_data = array('ret'=>0,'number'=>"18612261146") ;
        $json_data = json_encode($res_data, JSON_PRETTY_PRINT);
        echo $json_data ;
        die() ;

