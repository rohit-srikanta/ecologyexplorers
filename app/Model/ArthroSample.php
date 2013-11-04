<?php
App::uses('AppModel', 'Model');
/**
 * ArthroSample Model
 *
 * @property Site $Site
 * @property Habitat $Habitat
*/
class ArthroSample extends AppModel {


	public $validate = array(
			'observer'  => array(
					'rule' => 'notEmpty'),
			'collection_date'  => array(
					'rule' => 'notEmpty')
	);
	
	public $actsAs = array('Containable');
	public $hasMany = array(
			'ArthroSpecimen' => array(
					'className' => 'ArthroSpecimen',
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

	//Saving the arthro sample data along with arthro specimen data.
	public function savingthedata($fields)
	{
		$fields['ArthroSample']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields['ArthroSample']))
		{
			$count = 0;
			for($i=0;$i<20;$i++)
			{
				$str1 = "ArthroSpecimen".$i."trap_no";
				$str2 = "ArthroSpecimen".$i."taxon";
				$str3 = "ArthroSpecimen".$i."frequency";
				
				if(null != $fields['ArthroSample'][$str2] && null != $fields['ArthroSample'][$str1] && null != $fields['ArthroSample'][$str3])
				{					
					$newRow[$i]['trap_no'] = $fields['ArthroSample'][$str1];
					$newRow[$i]['arthro_taxon_id'] = $fields['ArthroSample'][$str2];
					$newRow[$i]['frequency'] = $fields['ArthroSample'][$str3];
					$newRow[$i]['arthro_sample_id'] = $this->getInsertID();
					$count++;
				}
			}
			
			if(($count > 0)  && (ClassRegistry::init('ArthroSpecimen')->saveFields($newRow)))
			{
				return true;
			}
		}
		return false;
	}
	
	public function validateData($fields)
	{
		for($i = 0; $i < 20; $i ++) {
			
			$str1 = "ArthroSpecimen" . $i . "trap_no";
			$str2 = "ArthroSpecimen" . $i . "taxon";
			$str3 = "ArthroSpecimen" . $i . "frequency";
			
			if (null != $fields ['ArthroSample'] [$str1] && null != $fields ['ArthroSample'] [$str2] && null != $fields ['ArthroSample'] [$str3]) {
				
				if ($fields ['ArthroSample'] [$str3] < 0 ) {
					return "negative";
				}
				
				for($j = $i + 1; $j < 20; $j ++) {					
					$strj1 = "ArthroSpecimen" . $j . "trap_no";
					$strj2 = "ArthroSpecimen" . $j . "taxon";
					$strj3 = "ArthroSpecimen" . $j . "frequency";

					if($fields ['ArthroSample'] [$str1] ==  $fields ['ArthroSample'] [$strj1] &&  $fields ['ArthroSample'] [$str2] ==  $fields ['ArthroSample'] [$strj2] &&  $fields ['ArthroSample'] [$str3] ==  $fields ['ArthroSample'] [$strj3]){
						
						return ($i+1).' and '.($j+1);
					}
				}
			}
		}
		return false;
	}
	
	public function getArthropodData($startDate,$endDate){
		
		$conditionsDate = array('ArthroSample.collection_date between ? and ?' => array($startDate, $endDate));
		
		$data = $this->find('all', array('conditions' => $conditionsDate,'fields' => array('ArthroSample.id','ArthroSample.observer','ArthroSample.comments','ArthroSample.collection_date'),'order' => array('ArthroSample.collection_date' => 'DESC')));
		
		return $data;
		
	}
}