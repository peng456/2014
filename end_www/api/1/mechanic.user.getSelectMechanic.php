<?php
/**
 * 获取待回答技师列表
 * API 2.3
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']) ||!isset($data['old_flag']))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);


if ($data['old_flag']==0)
{
	$mechanic_data = model('mechanic_accept')->get_list(array('q_id' => $data['q_id'] , 
	                                                            'is_push'=> 0 ) ) ;

	$data = array() ;
	$count = 0 ;
	$month_ago_time = time() - 30*24*3600 ;

	foreach ($mechanic_data as $key => $value) 
	{
		$userdata = model('mechanic_user')->get_one(array('user_id' => $value['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
		$answer_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_driver_mechanic_question as d_m_q inner join end_mechanic_question as question using(q_id) WHERE question.q_status > 1 and d_m_q.mechanic_id = {$value['mechanic_user_id']} AND question.create_time > $month_ago_time ") ;

		if (!$item || !$userdata || $answer_times === NULL )
	    die_json_msg('user表或joininfo表无技师数据',20100);

		$field_data = model('mechanic_professional_field')->get_list(array('_custom_sql'=>"SELECT field_name FROM end_mechanic_professional_field as a join end_mechanic_field as b on a.field_id = b.id  WHERE mechanic_id = {$value['mechanic_user_id']}")) ;
		$professional_field = array() ;
		foreach ($field_data as $key => $value2) {
			$professional_field[] = $value2['field_name'] ;
		}
        //获取 技师 专注车型
        $professional_brand_sql = "select brand_name from end_mechanic_car_brand where car_brand_id in(select brand_id from end_mechanic_professional_brand where mechanic_id = {$value['mechanic_user_id']})";
        $professional_brand_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_brand_sql));
        if($professional_brand_items === null){
            die_json_msg('professional_brand表查询失败', 10101);
        }
        $professional_brand = array();
        foreach ($professional_brand_items as $key_brand => $value_brand)
        {
            $professional_brand[$key_brand] = $value_brand['brand_name'];
        }

        $workcity = model('mechanic_city')->get_one(array('city_id'=>$joininfo['workcity'])) ;
        $workcityname = $workcity['city_name'] ;

        while($workcity['pid'] != 0)
        {
            $workcity = model('mechanic_city')->get_one(array('city_id'=>$workcity['pid'])) ;
            $workcityname = $workcity['city_name'].$workcityname ;
        }

        $upres = model('mechanic_accept')->update($value['accept_id'],array('is_push'=>1)) ;
		if (!$upres)
	    die_json_msg('accept表更新失败',10101);
        $workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$joininfo['workbrand'])) ;
        $favorite_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_favorite WHERE mechanic_user_id = {$value['mechanic_user_id']} and status = 1") ;
        $is_favorite = model('mechanic_favorite')->get_one(array('driver_user_id'=>$item['owner_id'],'mechanic_user_id'=>$value['mechanic_user_id'],'status'=>1));


        $data[] = array(
			'id'=>(int)$userdata['user_id'] ,
			'name'=>(string)$joininfo['name'] ,
			'avatar'=>(string)$userdata['avatar'] ,
			'answer_times'=>(int)$answer_times ,
			'stars'=>(int)$joininfo['stars'] ,
			'response_time'=>(int)$joininfo['response_time'] ,
			'reputation'=>(int)$joininfo['reputation'] ,
            'work_year'=>round((time()-$joininfo['work_year'])/31536000,1) ,
            'workbrand'=>(string)$workbrand['brand_name'] ,
            'professional_brand'=>$professional_brand ,
            'professional_field'=>$professional_field ,
            'workcity'=>(string)$workcityname ,
            'workplace'=>(string)$joininfo['workplace'] ,
            'technical_title'=>(string)$joininfo['technical_title'] ,
            'birth_year'=>(int)$joininfo['birth_year'] ,
            'education'=>(string)$joininfo['education'] ,
            'award'=>(string)$joininfo['award'] ,
            'resume'=>(string)$joininfo['resume'] ,
            'favorite_times'=>(int)$favorite_times ,
            'is_favorite'=>$is_favorite?1:0
			) ;

		$count++ ;
	}



	json_send(array('count'=>(int)$count ,'data'=>$data)) ;
}
else
{
    $count = 0 ;
    $month_ago_time = time() - 30*24*3600 ;

    $sql_query_num = "SELECT mechanic_user_id  FROM end_mechanic_accept WHERE q_id = {$data['q_id']} and is_push = 1 ORDER BY create_time ";
	$mechanic_data = model('mechanic_answer')->get_list(array('_custom_sql' =>$sql_query_num)) ;

	$data = array() ;
	foreach ($mechanic_data as $key => $value)
	{

		$userdata = model('mechanic_user')->get_one(array('user_id' => $value['mechanic_user_id']) ) ;
		$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
		$answer_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_driver_mechanic_question as d_m_q inner join end_mechanic_question as question using(q_id) WHERE question.q_status > 1 and d_m_q.mechanic_id = {$value['mechanic_user_id']} AND question.create_time > $month_ago_time ") ;	

		if (!$userdata || !$joininfo)
	    die_json_msg('user表或joininfo表无技师数据',20100);

		$field_data = model('mechanic_professional_field')->get_list(array('_custom_sql'=>"SELECT field_name FROM `end_mechanic_professional_field` as a join `end_mechanic_field` as b on a.field_id = b.id  WHERE mechanic_id = $userdata[user_id]")) ;
		$professional_field = array() ;
		foreach ($field_data as $key => $value2) {
			$professional_field[] = $value2['field_name'] ;
		}

        //获取 技师 专注车型
        $professional_brand_sql = "select brand_name from end_mechanic_car_brand where car_brand_id in(select brand_id from end_mechanic_professional_brand where mechanic_id = {$value['mechanic_user_id']})";
        $professional_brand_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_brand_sql));
        if($professional_brand_items === null){
            die_json_msg('professional_brand表查询失败', 10101);
        }
        $professional_brand = array();
        foreach ($professional_brand_items as $key_brand => $value_brand)
        {
            $professional_brand[$key_brand] = $value_brand['brand_name'];
        }

        $workcity = model('mechanic_city')->get_one(array('city_id'=>$joininfo['workcity'])) ;
        $workcityname = $workcity['city_name'] ;

        while($workcity['pid'] != 0)
        {
            $workcity = model('mechanic_city')->get_one(array('city_id'=>$workcity['pid'])) ;
            $workcityname = $workcity['city_name'].$workcityname ;
        }


        $workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$joininfo['workbrand'])) ;
        $favorite_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_favorite WHERE mechanic_user_id = {$value['mechanic_user_id']} and status = 1") ;
        $is_favorite = model('mechanic_favorite')->get_one(array('driver_user_id'=>$item['owner_id'],'mechanic_user_id'=>$value['mechanic_user_id'],'status'=>1));

        $data[] = array(
            'id'=>(int)$userdata['user_id'] ,
            'name'=>(string)$joininfo['name'] ,
            'avatar'=>(string)$userdata['avatar'] ,
            'answer_times'=>(int)$answer_times ,
            'stars'=>(int)$joininfo['stars'] ,
            'response_time'=>(int)$joininfo['response_time'] ,
            'reputation'=>(int)$joininfo['reputation'] ,
            'work_year'=>round((time()-$joininfo['work_year'])/31536000,1) ,
            'workbrand'=>(string)$workbrand['brand_name'] ,
            'professional_brand'=>$professional_brand ,
            'professional_field'=>$professional_field ,
            'workcity'=>(string)$workcityname ,
            'workplace'=>(string)$joininfo['workplace'] ,
            'technical_title'=>(string)$joininfo['technical_title'] ,
            'birth_year'=>(int)$joininfo['birth_year'] ,
            'education'=>(string)$joininfo['education'] ,
            'award'=>(string)$joininfo['award'] ,
            'resume'=>(string)$joininfo['resume'] ,
            'favorite_times'=>(int)$favorite_times ,
            'is_favorite'=>$is_favorite?1:0
			) ;
		$count++ ;
	}


	json_send(array('count'=>(int)$count ,'data'=>$data)) ;

}
