<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['mechanic_question'] = array(
    'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
    'name' => '问题列表',	//某型的名字，可以把一个栏目配置成某个模型
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
        'q_id' => array(//数据库中的字段名
            'name' => 'ID',//显示在后台的名字
            'type' => 'text',//类型
            'null' => true
        ),
        'driver_user_id' => array(
            'name' => '车友ID',
            'type' => 'text',
            'null' => true
        ),
        'text' => array(
            'name' => '文字描述',
            'type' => 'text',
            'null' => true
        ),
        'picture' => array(
            'name' => '图片',
            'type' => 'text',
            'null' => true
        ),
        'voice' => array(
            'name' => '语音',
            'type' => 'text',
            'null' => true
        ),
        'is_soluted' => array(
            'name' => '是否解决',
            'type' => 'text',
            'null' => true
        ),
        'is_accept' => array(
            'name' => '问题状态',
            'type' => 'text',
            'null' => true
        ),
        'view_count' => array(
            'name' => '浏览问题人数',
            'type' => 'text',
            'null' => true
        ),
        'type' => array(
            'name' => '提问类型',
            'type' => 'text',
            'null' => true
        ),
        'quick_count' => array(
            'name' => '快速提问选择技师人数',
            'type' => 'text',
            'null' => true
        ),
        'reward' => array(
            'name' => '赏金',
            'type' => 'text',
            'null' => true
        ),
       'create_time' => array(
          'name' => '创建时间',
           'type' => 'text',
           'null' => true,
          'filter'=>'show_mechanic_question_date'
        )
    ),
    //显示在列表中的内容
    'list_fields' => array(
        'q_id'=>array(//数据库中的字段名
            'name'=>'ID',//显示在后台的名字
            'width'=>'30',
            'sort'=>true,
            'align'=>'center',
            'search'=>true
        ),

        'driver_user_id'=>array(
            'name'=>'车友ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true,
            'search'=>true
        ),
        'text' => array(
            'name' => '文字描述',
            'type' => 'text',
            'null' => true
        ),
        'picture' => array(
            'name' => '图片',
            'type' => 'text',
            'null' => true
        ),
        'voice' => array(
            'name' => '语音',
            'type' => 'text',
            'null' => true
        ),
        'is_soluted' => array(
            'name' => '是否解决',
            'type' => 'text',
            'width'=>'auto',
            'null' => true
        ),
        'is_accept' => array(
            'name' => '问题状态',
            'type' => 'text',
            'null' => true
        ),
        'view_count' => array(
            'name' => '浏览问题人数',
            'type' => 'text',
            'null' => true
        ),
        'type' => array(
            'name' => '提问类型',
            'type' => 'text',
            'null' => true
        ),
        'quick_count' => array(
            'name' => '快速提问选择技师人数',
            'type' => 'text',
            'null' => true
        ),
        'reward' => array(
            'name' => '赏金',
            'type' => 'text',
            'null' => true
        ),

        'create_time'=>array(
            'name'=>'创建时间',
            'width'=>'auto',
            'type'=>'text',
            'filter'=>'show_mechanic_question_date'
        ),
        '_options'=>array(//显示操作里面的按钮
            'name'=>'操作',
            'width'=>100,
            'filter'=>'show_mechanic_question_options'
        )
    )
);

function show_mechanic_question_date($t)
{
    return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
    'name'=>'mechanic_question',
    'description'=>'问题列表',
    'rights'=>array('view','delete','update','add')
);

function show_mechanic_question_options($item)
{
    $id = 'q_id';
    end_show_view_button($item[$id]);
    end_show_edit_button($item[$id]);
    end_show_delete_button($item[$id]);
}