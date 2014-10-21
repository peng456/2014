<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['mechanic_car_series'] = array(
    'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
    'name' => '车系列列表',	//某型的名字，可以把一个栏目配置成某个模型
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
        'car_series_id' => array(//数据库中的字段名
            'name' => 'ID',//显示在后台的名字
            'type' => 'text',//类型
            'null' => true
        ),
        'car_brand_id' => array(
            'name' => '车牌ID',
            'type' => 'text',
            'null' => true
        ),
        'series' => array(
            'name' => '名字',
            'type' => 'text',
            'null' => true
        )
    ),
    //显示在列表中的内容
    'list_fields' => array(
        'car_series_id'=>array(//数据库中的字段名
            'name'=>'ID',//显示在后台的名字
            'width'=>'30',
            'sort'=>true,
            'align'=>'center',
            'search'=>true
        ),

        'car_brand_id'=>array(
            'name'=>'车品牌ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true,
            'search'=>true
        ),
        'series'=>array(
            'name'=>'名称',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true,
            'search'=>true
        ),
        '_options'=>array(//显示操作里面的按钮
            'name'=>'操作',
            'width'=>100,
            'filter'=>'show_mechanic_car_series_options'
        )
    )
);

function show_mechanic_car_series_date($t)
{
    return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
    'name'=>'mechanic_car_series',
    'description'=>'车系列列表',
    'rights'=>array('view','delete','update','add')
);

function show_mechanic_car_series_options($item)
{
    $id = 'car_series_id';
    end_show_view_button($item[$id]);
    end_show_edit_button($item[$id]);
    end_show_delete_button($item[$id]);
}