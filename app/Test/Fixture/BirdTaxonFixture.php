<?php
/**
 * BirdTaxonFixture
 *
 */
class BirdTaxonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'bird_taxon';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'species_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tsn' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'common_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'species_id' => 'Lo',
			'tsn' => 1,
			'common_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
