<?php
/**
 * 返回数据库中的车型信息
 * api 1.7
 *
 * @author duyifan	2014.10.20
 */
 
$data = $_POST;

if (!isset($data['type'])||!isset($data['parent']))
{
	die_json_msg('参数错误', 10100);
}

if(!in_array($data['type'],array('brand','series','model','q_type','field'))){
    die_json_msg('参数错误', 10100);
}

switch ($data['type']) {
	case 'brand':
		$brand_data = model('mechanic_car_brand')->get_list() ;
		$count = 0 ;
		$data = array() ;
		foreach ($brand_data as $key => $value) 
		{
			$count++ ;
			$data[] = array('id'=>(int)$value['car_brand_id'],'content'=>$value['brand_name']) ;
		}
		json_send(array('count'=>(int)$count,'data'=>$data)) ;
		break;
	
	case 'series':
		$series_data = model('mechanic_car_series')->get_list(array('car_brand_id'=>$data['parent'])) ;
		$count = 0 ;
		$data = array() ;
		foreach ($series_data as $key => $value) 
		{
			$count++ ;
			$data[] = array('id'=>(int)$value['car_series_id'],'content'=>$value['series']) ;
		}
		json_send(array('count'=>(int)$count,'data'=>$data)) ;
		break;

	case 'model':
		$model_data = model('mechanic_car_model')->get_list(array('car_series_id'=>$data['parent'])) ;
		$count = 0 ;
		$data = array() ;
		foreach ($model_data as $key => $value) 
		{
			$count++ ;
			$data[] = array('id'=>(int)$value['car_model_id'],'content'=>$value['car_model_name']) ;
		}
		json_send(array('count'=>(int)$count,'data'=>$data)) ;
		break;

	case 'q_type':
		$model_data = model('mechanic_question_type')->get_list(array('p_id'=>$data['parent'])) ;
		$count = 0 ;
		$data = array() ;
		foreach ($model_data as $key => $value) 
		{
			$count++ ;
			$data[] = array('id'=>(int)$value['q_type_id'],'content'=>$value['content']) ;
		}
		json_send(array('count'=>(int)$count,'data'=>$data)) ;
		break;
    case 'field':
        $model_data = model('mechanic_field')->get_list() ;
        $count = 0 ;
        $data = array() ;
        foreach ($model_data as $key => $value)
        {
            $count++ ;
            $data[] = array('id'=>(int)$value['id'],'content'=>$value['field_name']) ;
        }

        json_send(array('count'=>(int)$count,'data'=>$data)) ;
        break;
}
