<?php
/**
 * 获取最近提问列表
 * API 3.5
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['from']) || !is_numeric($data['from']) || !in_array($data['type'],array('hottest','last','car')))
{
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);
switch($data['type']){

    case  'hottest':
        $query_sql_hottest = "select knowledge_id ,count(knowledge_id) as num from end_mechanic_knowledgeview group by knowledge_id order by num DESC limit {$data['from']},10";
        $knowledge_view_items = model('mechanic_knowledgeview')->get_list(array('_custom_sql'=>$query_sql_hottest));
        if(!$knowledge_view_items){
            die_json_msg('knowledgeview表查询失败',10101);
        }
        $count = 0 ;
        $knowledge_data_send_items = array() ;
        foreach ($knowledge_view_items as $key => $knowledge_item_id)
        {
            $knowledge_item = model('mechanic_mechanic_knowledge')->get_one($knowledge_item_id['knowledge_id']);
            if($knowledge_items === null){
                die_json_msg('answerview表查询失败',10101);
            }
            $count++;
            $knowledge_data_send_items[] = array(
                'id'=> $knowledge_item['id'],
                'title'=> $knowledge_item['title'],
                'picture'=> $knowledge_item['picture'],
                'part_content'=> $knowledge_item['part_content'],
                'link_address'=> $knowledge_item['link_address'],
                'createtime'=> $knowledge_item['createtime'],
            );
        }
        json_send(array('count'=>$count,'data'=>$knowledge_data_send_items));

    case  'last':
        $query_sql_last = "select * from end_mechanic_knowledge  order by create_time DESC limit {$data['from']},10";
        $knowledge_items = model('mechanic_mechanic_knowledge')->get_list(array('_custom_sql'=>$query_sql_last));
        if($knowledge_items === null){
            die_json_msg('answerview表查询失败',10101);
        }
        $count = 0 ;
        $knowledge_data_send_items = array() ;
        foreach ($knowledge_items as $key => $knowledge_item)
        {
            $count++;
            $knowledge_data_send_items[] = array(
                'id'=> $knowledge_item['id'],
                'title'=> $knowledge_item['title'],
                'picture'=> $knowledge_item['picture'],
                'part_content'=> $knowledge_item['part_content'],
                'link_address'=> $knowledge_item['link_address'],
                'createtime'=> $knowledge_item['createtime']
            );

        }
        json_send(array('count'=>$count,'data'=>$knowledge_data_send_items));

    case  'car':
        if(!isset($data['brand']))
        {
            die_json_msg('参数错误', 10100);
        }

        $knowledge_sql = "select * from end_mechanic_knowledge where brand = {$data['car']} limit {$data['from']},10";
        $knowledge_items = model('mechanic_knowledge')->get_list(array('_custom_sql'=>$knowledge_sql));
        if(!$knowledge_items)
        {
            die_json_msg('没有此车品牌相关知识', 21300);
        }


        $count = 0 ;
        $knowledge_data_send_items = array() ;
        foreach ($knowledge_items as $key => $knowledge_item)
        {
            $count++;
            $knowledge_data_send_items[] = array(
            'id'=> $knowledge_item['id'],
            'title'=> $knowledge_item['title'],
            'picture'=> $knowledge_item['picture'],
            'part_content'=> $knowledge_item['part_content'],
            'link_address'=> $knowledge_item['link_address'],
            'createtime'=> $knowledge_item['createtime'],
            );
        }
        json_send(array('count'=>$count,'data'=>$knowledge_data_send_items));
}






