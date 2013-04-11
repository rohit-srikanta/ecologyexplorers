<?php
App::uses('AppModel', 'Model');
/**
 * VegSpecimen Model
 *
 */
class VegSpecimen extends AppModel {
	
	public $actsAs = array('Containable');
	public $belongsTo = array(
			'VegSample' => array(
					'className' => 'VegSample',
					'foreignKey'   => 'veg_sample_id',
			),
			'VegTaxon' => array(
					'className' => 'VegTaxon',
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

}
