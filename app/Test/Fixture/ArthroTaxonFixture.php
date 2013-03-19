<?php
/**
 * ArthroTaxonFixture
 *
 */
class ArthroTaxonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'arthro_taxon';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'taxon' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'taxon_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'taxon' => array('column' => 'taxon', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'taxon' => 'Lore',
			'taxon_name' => 'Lorem ipsum dolor sit amet',
			'date_entered' => '2013-03-18 23:09:49'
		),
	);

}
