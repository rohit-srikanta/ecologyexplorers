<?php
App::uses('AppModel', 'Model');
/**
 * BirdTaxon Model
 *
 */
class BirdTaxon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'bird_taxon';
	
	public $actsAs = array('Containable');
	public $hasMany = array(
			'BirdSpecimen' => array(
					'className' => 'BirdSpecimen',
			)
	);
	
	public function getBirdList()
	{
		$taxon = $this->find('list', array(
				'fields' => array(
						'BirdTaxon.id',
						'BirdTaxon.common_name')));
		return $taxon;
	}

}
