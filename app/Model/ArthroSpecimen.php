<?php
App::uses('AppModel', 'Model');

/**
 * ArthroSpecimen Model
 *
 * @property Trap $Trap
 * @property Sample $Sample
*/
class ArthroSpecimen extends AppModel {
	
	public $actsAs = array('Containable');
	public $belongsTo = array(
			'ArthoSample' => array(
					'className' => 'ArthroSample',
					'foreignKey'   => 'arthro_sample_id',
			),
			'ArthroTaxon' => array(
					'className' => 'ArthroTaxon',
					'foreignKey'   => 'arthro_taxon_id',
			),
	);
	
	
	public $validate = array(
			'trap_no'  => array(
					'rule' => 'notEmpty'),
			'frequency'  => array(
					'rule' => 'notEmpty')
	);

	//Saving the data passed from arthro samples class
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}
}
