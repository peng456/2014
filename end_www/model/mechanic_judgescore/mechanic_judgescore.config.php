<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['mechanic_judgescore'] = array(
    'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
    'name' => '评分表',	//某型的名字，可以把一个栏目配置成某个模型
    'list_items'=>30, //后台每页显示
    'no_category'=>true,
    'category_fields'=> array(
        'name'=>array(
            'name'=>lang('Name'),
            'type'=>'text',
            'null'=>false
        )
    ),
    //在查看操作中显示的内容，查看按钮在每条数据的后面
    'fields' => array(
        'judgescore_id' => array(//数据库中的字段名
            'name' => 'ID',//显示在后台的名字
            'type' => 'text',//类型
            'null' => true
        ),
        'a_id' => array(
            'name' => '答案ID',
            'type' => 'text',
            'null' => true
        ),
        'driver_user_id' => array(
            'name' => '用户ID',
            'type' => 'text',
            'null' => true
        ),
        'resolution' => array(
            'name' => '解决程度',
            'type' => 'text',
            'null' => true
        ),
        'response_time' => array(
            'name' => '响应时间',
            'type' => 'text',
            'null' => true
        ),
        'attitude' => array(
            'name' => '回答态度',
            'type' => 'text',
            'null' => true
        ),
        'create_time' => array(
            'name' => '创建时间',
            'type' => 'text',
            'null' => true,
            'filter'=>'show_mechanic_judgescore_date'
        )
    ),
    //显示在列表中的内容
    'list_fields' => array(
        'judgescore_id'=>array(//数据库中的字段名
            'name'=>'ID',//显示在后台的名字
            'width'=>'30',
            'sort'=>true,
            'align'=>'center',
            'search'=>true
        ),

        'a_id'=>array(
            'name'=>'答案ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true,
            'search'=>true
        ),
        'driver_user_id'=>array(
            'name'=>'用户ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true
        ),
        'resolution'=>array(
            'name'=>'解决程度',
            'width'=>'auto',
            'type'=>'text'
        ),
        'response_time'=>array(
            'name'=>'响应时间',
            'width'=>'auto',
            'type'=>'text'
        ),
        'attitude'=>array(
            'name'=>'回答态度',
            'width'=>'auto',
            'type'=>'text'
        ),
        'create_time'=>array(
            'name'=>'创建时间',
            'width'=>'auto',
            'type'=>'text',
            'filter'=>'show_mechanic_judgescore_date'
        ),
        '_options'=>array(//显示操作里面的按钮
            'name'=>'操作',
            'width'=>100,
            'filter'=>'show_mechanic_judgescore_options'
        )
    )
);

function show_mechanic_judgescore_date($t)
{
    return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
    'name'=>'mechanic_judgescore',
    'description'=>'评分表',
    'rights'=>array('view','delete','update','add')
);

function show_mechanic_judgescore_options($item)
{
    $id = 'judgescore_id';
    end_show_view_button($item[$id]);
    end_show_edit_button($item[$id]);
    end_show_delete_button($item[$id]);
}