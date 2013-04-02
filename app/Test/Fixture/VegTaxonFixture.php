<?php
/**
 * VegTaxonFixture
 *
 */
class VegTaxonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'veg_taxon';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'species_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'common_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'species_id' => array('column' => 'species_id', 'unique' => 1)
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
			'species_id' => 'Lore',
			'type' => 'Lorem ip',
			'common_name' => 'Lorem ipsum dolor sit amet',
			'date_entered' => '2013-04-01 22:43:07'
		),
	);

}
