<?php
App::uses('AppModel', 'Model');
/**
 * ArthroTaxon Model
 *
 */
class ArthroTaxon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'arthro_taxon';
	
	public $actsAs = array('Containable');
	public $hasMany = array(
			'ArthroSpecimen' => array(
					'className' => 'ArthroSpecimen',
			)
	);
	
	//Retrieving the list of taxon names and id
	public function getOrderList()
	{
		$taxon = $this->find('list', array(
				'fields' => array(
						'ArthroTaxon.id',
            'ArthroTaxon.taxon_name'),
        'order' => 'ArthroTaxon.taxon_name'));
		return $taxon;
	}
}
