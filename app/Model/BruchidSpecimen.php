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
	
	//Saving the data passed from bruchid samples class
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

}
