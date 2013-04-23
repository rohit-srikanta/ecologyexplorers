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

	//Saving the data passed from bird samples class
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

}
