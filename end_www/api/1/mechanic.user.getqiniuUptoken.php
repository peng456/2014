<?php

$data = $_POST;

if(!isset($data['upload_type']))
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

if(!in_array($data['upload_type'],array('head','question','answer','knowledge_mechanic','knowledge_bid'))){
    die_json_msg('参数错误', 10100);
  }


$bucket = 'machinist';
$accessKey = 'st_XjWAVENJCjDDWOYfMpxB3YtOo4Dt4g4kmyxhQ';
$secretKey = '7TgfT33PFOoxKgQ7nlNY8ovFoHcek3pjMfjBMgqA';

Qiniu_SetKeys($accessKey, $secretKey);
$putPolicy = new Qiniu_RS_PutPolicy($bucket);
$upToken = $putPolicy->Token(null);

$key1 = $data['upload_type'].time().rand(0,1000);

if(isset($data['upload_count']) && (!in_array((int)$data['upload_count'],array(0,1))))
{
      $name_array = array();
     for($i = 1; $i <=((int)$data['upload_count'] ) ; $i++){
             array_push($name_array,$key1."-". $i);
          }
        json_send(array('upToken'=>$upToken,
                         'filename'=>$name_array,
                         'bucket'  =>$bucket
                         ));
}
else{
    json_send(array('upToken'=>$upToken,'filename'=>array($key1),'bucket'=>$bucket));
}
