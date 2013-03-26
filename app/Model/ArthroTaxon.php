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

	public function getOrderList()
	{
		$taxon = $this->find('list', array(
				'fields' => array(
						'ArthroTaxon.id',
						'ArthroTaxon.taxon_name')));
		return $taxon;
	}
}
