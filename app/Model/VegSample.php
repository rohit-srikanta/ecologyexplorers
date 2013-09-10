<?php
App::uses('AppModel', 'Model');
/**
 * VegSample Model
 *
*/
class VegSample extends AppModel {

	public $validate = array(
			'observer'  => array(
					'rule' => 'notEmpty'),
			'collection_date'  => array(
					'rule' => 'notEmpty'),
			'tree_count'  => array(
					'rule' => array('naturalNumber',true),
					'message' => 'The value has to be greater than or equal to 0'),
			'cactus_count'  => array(
					'rule' => array('naturalNumber',true),
					'message' => 'The value has to be greater than or equal to 0'),
			'shrub_count'  => array(
					'rule' => array('naturalNumber',true),
					'message' => 'The value has to be greater than or equal to 0'),
	);
	public $allowZero = true;
	public $actsAs = array('Containable');
	public $hasMany = array(
			'VegSpecimen' => array(
					'className' => 'VegSpecimen',
			)
	);
	
	public $belongsTo = array(
			'Habitat' => array(
					'className' => 'Habitat',
					'foreignKey'   => 'habitat_id',
			),
			'Site' => array(
					'className' => 'Site',
					'foreignKey'   => 'site_id',
			),
			'TeachersClass' => array(
					'className' => 'TeachersClass',
					'foreignKey'   => 'teachers_class_id',
			)
	);
	
	//Saving the arthro sample data along with veg specimen data.
	public function savingthedata($fields)
	{
		$fields['VegSample']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields['VegSample']))
		{
			$count = 0;
			for($i=0;$i<20;$i++)
			{
				$str1 = "VegSpecimen".$i."veg_no";
				$str2 = "VegSpecimen".$i."plant_type";
				$str3 = "VegSpecimen".$i."species_id";
				$str4 = "VegSpecimen".$i."circumference";
				$str5 = "VegSpecimen".$i."height";
				$str6 = "VegSpecimen".$i."canopy";
				$str7 = "VegSpecimen".$i."comments";				
				
				if(null != $fields['VegSample'][$str2] && null != $fields['VegSample'][$str1] && null != $fields['VegSample'][$str3]  && null != $fields['VegSample'][$str4] && null != $fields['VegSample'][$str5] && null != $fields['VegSample'][$str6])
				{
					$newRow[$i]['veg_no'] = $fields['VegSample'][$str1];
					$newRow[$i]['plant_type'] = $fields['VegSample'][$str2];
					$newRow[$i]['species_id'] = $fields['VegSample'][$str3];
					$newRow[$i]['circumference'] = $fields['VegSample'][$str4];
					$newRow[$i]['height'] = $fields['VegSample'][$str5];
					$newRow[$i]['canopy'] = $fields['VegSample'][$str6];
					$newRow[$i]['comments'] = $fields['VegSample'][$str7];
					$newRow[$i]['veg_sample_id'] = $this->getInsertID();
					$count++;
				}
			}
			
			if(($count > 0)  && (ClassRegistry::init('VegSpecimen')->saveFields($newRow)))
			{
				return true;
			}
		}
		return false;
	}
	public function checkNegativeNumbers($fields) {
		
		for($i = 0; $i < 20; $i ++) {
			
			$str1 = "VegSpecimen" . $i . "circumference";
			$str2 = "VegSpecimen" . $i . "height";
			$str3 = "VegSpecimen" . $i . "canopy";
			
			if (null != $fields ['VegSample'] [$str1] && null != $fields ['VegSample'] [$str2] && null != $fields ['VegSample'] [$str3]) {
				
				if ($fields ['VegSample'] [$str1] < 0 || $fields ['VegSample'] [$str2] < 0 || $fields ['VegSample'] [$str3] < 0) {
					return true;
				}
			}
		}
		return false;
	}
}
