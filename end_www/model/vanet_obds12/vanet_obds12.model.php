<?php
/**
 * maker model class
 *
 * @author liudanking
 */

class MODEL_VANET_OBDS12 extends MODEL
{
	function MODEL_VANET_OBDS12()
	{
		$this->table = END_MYSQL_PREFIX.'vanet_obds12';
		$this->id = 'obds12_id';
	}

	function add($data=array())
	{
		$data['create_time'] = time();
		return parent::add($data);
	}
	
	function get_one_scaled($id)
	{
		$item = $this->get_one($id);
		if (!$item)
		{
			return $item;
		}
		else
		{
			return $this->scale_item($item);
		}
	}
	

	function scale_item(&$item)
	{
		if (!$item)
			return;
		else
		{
			$fuel_type = array('01'=>'Gasoline/petrol',
						   '02'=>'Methanol',
						   '03'=>'Ethanol',
						   '04'=>'Diesel',
						   '05'=>'Liquefied Petroleum Gas (LPG)',
						   '06'=>'Compressed Natural Gas (CNG)',
						   '07'=>'Propane',
						   '08'=>'Battery/electric',
						   '09'=>'Bi-fuel vehicle using gasoline',
						   '0A'=>'Bi-fuel vehicle using methanol',
						   '0B'=>'Bi-fuel vehicle using ethanol',
						   '0C'=>'Bi-fuel vehicle using LPG',
						   '0D'=>'Bi-fuel vehicle using CNG',
						   '0E'=>'Bi-fuel vehicle using propane ',
						   '0F'=>'Bi-fuel vehicle using battery');
						   
			$item['DTC_CNT'] = $item['DTC_CNT'] & 0x7F;
			$item['DTCFRZF'] = sprintf('%X', $item['DTCFRZF']);
			$item['LOAD_PCT'] = sprintf('%.4f', $item['LOAD_PCT']/255.0);
			$item['ECT'] = $item['ECT'] - 40;
			$item['RPM'] = sprintf('%.2f', $item['RPM']/4.0);
			$item['SPARKADV'] = sprintf('%.2f', $item['SPARKADV']/2.0 - 64.0);
			$item['IAT'] = $item['IAT'] - 40;
			$item['MAF'] = sprintf('%.2f', $item['MAF']/100.0);
			$item['TP'] = sprintf('%.4f', $item['TP']/255.0);
			$item['FLI'] = sprintf('%.4f', $item['FLI']/255.0);
			$item['VPWR'] = sprintf('%.2f', $item['VPWR']/1000.0);
			$item['AAT'] = $item['AAT'] - 40;
			if ($item['FUEL_TYP'] >= 1 && $item['FUEL_TYP'] <= 15)
				$item['FUEL_TYP'] = $fuel_type[sprintf('%02x', $item['FUEL_TYP'])];
			$item['APP_R'] = sprintf('%.2f', $item['APP_R']/255.0);
			
		}
	}
}