<?php
/**
 * 获取技师,通过专长          ||          智能排序
 * @author           zhanglipeng 2014.11.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['professional_field']) || !is_numeric($data['professional_field']) || !isset($data['type']) || !isset($data['from']))
{
	die_json_msg('参数错误', 10100);
}
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item)
    die_json_msg('access_token不可用',10600);


if(!in_array($data['type'],array(0,1))){
    die_json_msg('参数错误', 10100);
}

if($data['type'] == 0) {    //按专长      排序
    $select_mechanic_id_sql = "select mechanic_id from end_mechanic_professional_field where field_id = {$data['professional_field']} limit {$data['from']},10";
    $select_mechanic_id_items = model('')->get_list(array('_custom_sql'=>$select_mechanic_sql));

    $count_mechanic = 0;
    $data_send = array();
    foreach ($select_mechanic_id_items as $key =>$select_mechanic_id)
    {
        //获取技师基本信息
        $select_mechanic_sql = "select mechanic.user_id , mechanic.avatar,joininfo.name,joininfo.stars,joininfo.workbrand ,joininfo.reputation from end_mechanic_user as mechanic inner join end_mechanic_joininfo as joininfo using(joininfo_id) where mechanic.user_id = {$select_mechanic_id['mechanic_id']}";
        $mechanic_item = model('mechanic_user')->get_one(array('_custom_sql'=>$select_mechanic_sql));
        if(!$mechanic_item )  continue;
        //获取 技师 擅长领域
        $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$select_mechanic_id['mechanic_id']})";
        $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
        if($professional_field_items === null){
            die_json_msg('professional_field表查询失败', 10101);
        }
        $professional_field = array();
        foreach ($professional_field_items as $key => $select_mechanic_id)
        {
            $professional_field[] = $select_mechanic_id['field_name'];

        }

        $data_send[] = array(
            'mechanic_id'=>(int)$mechanic_item['usr_id'],
            'avatar'=>$mechanic_item['avatar'],
            'name'=>$mechanic_item['name'],
            'stars'=>$mechanic_item['stars'],
            'workbrand'=>$mechanic_item['workbrand'],
            'reputation'=>$mechanic_item['reputation'],
            'professional_field'=>$professional_field
        );
        $count_mechanic++;
    }

    json_send(array('count'=>$count_mechanic,'data'=>$data_send));

}elseif($data['type'] == 1){

}
