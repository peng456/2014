<?php
/**
 * 提交车友收藏技师
 * API 2.5
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['mechanic_id']) || !preg_match('/^\d+$/i', $data['mechanic_id']) || !isset($data['type']) || !in_array($data['type'],array(0,1)))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item){
    die_json_msg('access_token不可用',10600);
}
$driver_user_id = $item['owner_id'] ;
$favorite_item = model('mechanic_favorite')->get_one(array('driver_user_id'=>$driver_user_id,'mechanic_user_id'=>$data['mechanic_id']));

if($data['type'] == 1){   //收藏技师

    if($favorite_item){ // 已经 follow了这家商店，则返回这家商店的favorit_id

        $favorite_item_update = model('mechanic_favorite')->update((int)$favorite_item['favorite_id'],array(
            'status'=>'1'));
        if(!$favorite_item_update){
            die_json_msg('favorite表更新失败',10101);
        }
        json_send();
    }
    $insert = model('mechanic_favorite')->add(array('driver_user_id'=>$driver_user_id,
        'mechanic_user_id'=>$data['mechanic_id'],
        'create_time'=>time(),
        'status'=>'1'));
    if(!$insert){
        die_json_msg('favorite表增加失败',10101);
    }

    json_send();

}
elseif($data['type'] == 0){  //取消收藏
    if($favorite_item){ // 已经 follow了这家商店，则返回这家商店的favorit_id

        $favorite_item_update = model('mechanic_favorite')->update((int)$favorite_item['favorite_id'],array(
            'status'=>'0'));

        if(!$favorite_item_update){
            die_json_msg('favorite表更新失败',10101);
        }
        json_send();
    }

    die_json_msg('该用户还没有收藏此技师',20500);



}










