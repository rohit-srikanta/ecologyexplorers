<?php
App::uses('AppModel', 'Model');
/**
 * VegTaxon Model
 *
 */
class VegTaxon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'veg_taxon';
	
	public $actsAs = array('Containable');
	public $hasMany = array(
			'VegSpecimen' => array(
					'className' => 'VegSpecimen',
			)
	);
	
	//Retrieving the list of taxon names and id
	public function getOrderList()
	{
		$taxon = $this->find('list', array(
				'fields' => array(
						'VegTaxon.id',
						'VegTaxon.common_name')));
		return $taxon;
	}

}
