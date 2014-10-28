<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['mechanic_question_type'] = array(
    'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
    'name' => '问题类型列表',	//某型的名字，可以把一个栏目配置成某个模型
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
        'q_type_id' => array(//数据库中的字段名
            'name' => 'ID',//显示在后台的名字
            'type' => 'text',//类型
            'null' => true
        ),
        'p_id' => array(
            'name' => '父ID',
            'type' => 'text',
            'null' => true
        ),
        'content' => array(
            'name' => '内容',
            'type' => 'text',
            'null' => true
        )
    ),
    //显示在列表中的内容
    'q_type_id' => array(
        'comment_id'=>array(//数据库中的字段名
            'name'=>'ID',//显示在后台的名字
            'width'=>'30',
            'sort'=>true,
            'align'=>'center',
            'search'=>true
        ),

        'p_id'=>array(
            'name'=>'父ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true,
            'search'=>true
        ),
        'content'=>array(
            'name'=>'内容',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true
        ),
        '_options'=>array(//显示操作里面的按钮
            'name'=>'操作',
            'width'=>100,
            'filter'=>'show_mechanic_comment_options'
        )
    )
);

function show_mechanic_question_type_date($t)
{
    return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
    'name'=>'mechanic_question_type',
    'description'=>'问题类型列表',
    'rights'=>array('view','delete','update','add')
);

function show_mechanic_question_type_options($item)
{
    $id = 'q_type_id';
    end_show_view_button($item[$id]);
    end_show_edit_button($item[$id]);
    end_show_delete_button($item[$id]);
}