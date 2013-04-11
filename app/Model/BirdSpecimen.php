<?php
App::uses('AppModel', 'Model');
/**
 * BirdSpecimen Model
 *
*/
class BirdSpecimen extends AppModel {

	public $validate = array(
			'frequency'  => array(
					'rule' => 'notEmpty')
	);

	public $actsAs = array('Containable');
	public $belongsTo = array(
			'BirdSample' => array(
					'className' => 'BirdSample',
					'foreignKey'   => 'bird_sample_id',
			),
			'BirdTaxon' => array(
					'className' => 'BirdTaxon',
					'foreignKey'   => 'species_id',
			),
	);


	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

	public function retrieveBirdData($startDate,$endDate)
	{
		$data2 = $this->find('all', array('contain' => array('BirdSample','BirdTaxon'),'conditions' => array('BirdSample.collection_date between ? and ?' => array($startDate, $endDate)),'fields' => array('BirdSample.id','BirdSample.site_id','BirdSample.habitat_id','BirdSample.air_temp AS Temperature','BirdSample.cloud_cover','BirdSample.comments','BirdSpecimen.frequency')));
		return $data2;
	}
}
