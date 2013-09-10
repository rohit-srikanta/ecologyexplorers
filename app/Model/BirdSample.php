<?php
App::uses('AppModel', 'Model');
/**
 * BirdSample Model
 *
*/
class BirdSample extends AppModel {

	public $validate = array(
			'observer'  => array(
					'rule' => 'notEmpty'),
			'collection_date'  => array(
					'rule' => 'notEmpty'),
			'air_temp'  => array(
					'rule' => 'notEmpty'),
			'cloud_cover'  => array(
					'rule' => 'notEmpty'),
	);

	public $actsAs = array('Containable');
	public $hasMany = array(
			'BirdSpecimen' => array(
					'className' => 'BirdSpecimen',
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
			),
			'CloudCover' => array(
					'className' => 'CloudCover',
					'foreignKey'   => 'cloud_cover_id',
			)
	);
	//Saving the arthro sample data along with bird specimen data.
	public function savingthedata($fields)
	{
		$fields['BirdSample']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields['BirdSample']))
		{
			$count = 0;
			for($i=0;$i<20;$i++)
			{
				$str1 = "BirdSpecimen".$i."taxon";
				$str2 = "BirdSpecimen".$i."frequency";

				if(null != $fields['BirdSample'][$str1] && null != $fields['BirdSample'][$str2])
				{
					$newRow[$i]['species_id'] = $fields['BirdSample'][$str1];
					$newRow[$i]['frequency'] = $fields['BirdSample'][$str2];
					$newRow[$i]['bird_sample_id'] = $this->getInsertID();
					$count ++;
				}
			}

			if(($count > 0)  && (ClassRegistry::init('BirdSpecimen')->saveFields($newRow)))
			{
				return true;
			}
		}
		return false;
	}
	
	public function checkNegativeNumbers($fields) {
	
		for($i = 0; $i < 20; $i ++) {
				
			$str1 = "BirdSpecimen" . $i . "taxon";
			$str2 = "BirdSpecimen" . $i . "frequency";
				
			if (null != $fields ['BirdSample'] [$str1] && null != $fields ['BirdSample'] [$str2]) {
	
				if ($fields ['BirdSample'] [$str2] < 0) {
					return true;
				}
			}
		}
		return false;
	}
}
