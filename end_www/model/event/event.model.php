<?php
/**
 * event model class
 *
 * @author Liu Longbill
 */

class MODEL_EVENT extends MODEL
{
	function MODEL_EVENT()
	{
		$this->table = END_MYSQL_PREFIX.'event';
		$this->id = 'event_id';
		$this->order_id = 'create_time';
	}
	
	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}

	function get_activity_name_by_id($event_id)
	{
		global $db;
		$data = $db->get_one("select a.name from end_event e,end_activity a where e.activity_id=a.activity_id and e.event_id=".$event_id);
		return $data['name'];
	}
	function get_id_by_activity_name($name)
	{
		global $db;
		$data = $db->get_one("select e.event_id from end_event e,end_activity a where e.activity_id=a.activity_id and a.name=".$name);
		if(!$data) return '';
		return $data['event_id'];
	}
	// 查看event表，将这个event涉及的所有素质培养点记录下以便初始化
	function init_suzhipeiyandian($event_id)
	{
		$typearr = array('wenjuan','ziping','huping','pingjia');
		$event = model('event')->get_one(array('event_id'=>$event_id,'status'=>0));
		foreach($typearr as $t)
		{
			// 查看event表，将这个event涉及的所有素质培养点记录下以便初始化
			$arr = json_decode($event[$t],true);

			if($t=='wenjuan')
			{
				$ansoptions[$t] = $arr;
				foreach($arr as $o)
				{
					foreach($o['options'] as $o)
					{
						foreach($o['points'] as $p)
						{
							if(!$p) continue;
							$szpyd_id = model("suzhipeiyangdian")->get_one(array('select'=>'suzhipeiyangdian_id','name'=>$p));
							// 如果该素质培养点在suzhipeiyangdian表中找不到，忽略
							if(!$szpyd_id) continue;
							if($checkarr[$p]) continue;
							$item_name_id[$p] = $szpyd_id['suzhipeiyangdian_id'];
							$checkarr[$p] = true;
						}
					}
				}
			}
			else
			{
				$ansoptions[$t] = $arr;
				foreach($arr as $o)
				{
					foreach($o['points'] as $p)
					{
						if(!$p) continue;
						if($checkarr[$p]) continue;
						$szpyd_id = model("suzhipeiyangdian")->get_one(array('select'=>'suzhipeiyangdian_id','name'=>$p));
						// 如果该素质培养点在suzhipeiyangdian表中找不到，忽略
						if(!$szpyd_id) continue;
						$item_name_id[$p] = $szpyd_id['suzhipeiyangdian_id'];
						$checkarr[$p] = true;
					}
				}
			}
		}
		print_r($item_name_id);
		die;
	}
	function count_weight($event_id,$ans_arr)
	{
		
	}
}