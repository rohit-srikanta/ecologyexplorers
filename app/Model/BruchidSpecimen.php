<?php
App::uses('AppModel', 'Model');
/**
 * BruchidSpecimen Model
 *
 */
class BruchidSpecimen extends AppModel {
	
	public $actsAs = array('Containable');
	public $belongsTo = array(
			'BruchidSample' => array(
					'className' => 'BruchidSample',
					'foreignKey'   => 'bruchid_sample_id',
			)
	);
	
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

}
