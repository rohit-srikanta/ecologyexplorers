<?php
App::uses('AppModel', 'Model');
/**
 * BruchidSample Model
 *
*/
class BruchidSample extends AppModel {

	public $validate = array(
			'observer'  => array(
					'rule' => 'notEmpty'),
			'location'  => array(
					'rule' => 'notEmpty')
	);
	
	public $actsAs = array('Containable');
	public $hasMany = array(
			'BruchidSpecimen' => array(
					'className' => 'BruchidSpecimen',
			)
	);
	
	public $belongsTo = array(
			'Site' => array(
					'className' => 'Site',
					'foreignKey'   => 'site_id',
			),
			'TeachersClass' => array(
					'className' => 'TeachersClass',
					'foreignKey'   => 'teachers_class_id',
			)
	);
	
	//Saving the arthro sample data along with brutchid specimen data.
	public function savingthedata($fields)
	{
		$fields['BruchidSample']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields['BruchidSample']))
		{
			$count = 0;
			for($i=0;$i<20;$i++)
			{
				$str1 = "BruchidSpecimen".$i."tree_no";
				$str2 = "BruchidSpecimen".$i."pod_no";
				$str3 = "BruchidSpecimen".$i."hole_count";
				$str4 = "BruchidSpecimen".$i."seed_count";

				if(null != $fields['BruchidSample'][$str1] && null != $fields['BruchidSample'][$str2] && null != $fields['BruchidSample'][$str3] && null != $fields['BruchidSample'][$str4])
				{
					$newRow[$i]['tree_no'] = $fields['BruchidSample'][$str1];
					$newRow[$i]['pod_no'] = $fields['BruchidSample'][$str2];
					$newRow[$i]['hole_count'] = $fields['BruchidSample'][$str3];
					$newRow[$i]['seed_count'] = $fields['BruchidSample'][$str4];
					$newRow[$i]['bruchid_sample_id'] = $this->getInsertID();
					$count++;
				}
			}

			if(($count > 0)  && (ClassRegistry::init('BruchidSpecimen')->saveFields($newRow)))
			{
				return true;
			}
		}
		return false;
	}
	
	public function validateData($fields) {
		for($i = 0; $i < 20; $i ++) {
			
			$str1 = "BruchidSpecimen" . $i . "tree_no";
			$str2 = "BruchidSpecimen" . $i . "pod_no";
			$str3 = "BruchidSpecimen" . $i . "hole_count";
			$str4 = "BruchidSpecimen" . $i . "seed_count";
			
			if (null != $fields ['BruchidSample'] [$str1] && null != $fields ['BruchidSample'] [$str2] && null != $fields ['BruchidSample'] [$str3] && null != $fields ['BruchidSample'] [$str4]) {
				
				if ($fields ['BruchidSample'] [$str3] < 0 || $fields ['BruchidSample'] [$str4] < 0) {
					return "negative";
				}
				
				for($j = $i + 1; $j < 20; $j ++) {
					$strj1 = "BruchidSpecimen" . $j . "tree_no";
					$strj2 = "BruchidSpecimen" . $j . "pod_no";
					$strj3 = "BruchidSpecimen" . $j . "hole_count";
					$strj4 = "BruchidSpecimen" . $j . "seed_count";
					
					if ($fields ['BruchidSample'] [$str1] == $fields ['BruchidSample'] [$strj1] && $fields ['BruchidSample'] [$str2] == $fields ['BruchidSample'] [$strj2] && $fields ['BruchidSample'] [$str3] == $fields ['BruchidSample'] [$strj3] && $fields ['BruchidSample'] [$str4] == $fields ['BruchidSample'] [$strj4]) {						
						return ($i + 1) . ' and ' . ($j + 1);
					}
				}
			}
		}
		return false;
	}
	
	public function getBruchidData($startDate,$endDate){
	
		$conditionsDate = array('BruchidSample.collection_date between ? and ?' => array($startDate, $endDate));
	
		$data = $this->find('all', array('conditions' => $conditionsDate,'fields' => array('BruchidSample.id','BruchidSample.observer','BruchidSample.site_type','BruchidSample.collection_date','BruchidSample.tree_type','BruchidSample.location'),'order' => array('BruchidSample.collection_date' => 'DESC')));
	
		return $data;
	
	}
}
