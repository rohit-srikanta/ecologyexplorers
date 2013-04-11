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

	public function savingthedata($fields)
	{
		$fields['ArthroSample']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields['ArthroSample']))
		{
			for($i=0;$i<10;$i++)
			{
				$str1 = "ArthroSpecimen".$i."trap_no";
				$str2 = "ArthroSpecimen".$i."taxon";
				$str3 = "ArthroSpecimen".$i."frequency";
				
				if(null != $fields['ArthroSample'][$str2] && null != $fields['ArthroSample'][$str1] && null != $fields['ArthroSample'][$str3])
				{
					$newRow[$i]['trap_no'] = $fields['ArthroSample'][$str1];
					$newRow[$i]['taxon'] = $fields['ArthroSample'][$str2];
					$newRow[$i]['frequency'] = $fields['ArthroSample'][$str3];
					$newRow[$i]['arthro_sample_id'] = $this->getInsertID();
				}
			}
			if(ClassRegistry::init('ArthroSpecimen')->saveFields($newRow))
			{
				return true;
			}
		}
		return false;
	}
}