<?php
/**
 * BirdSpecimenFixture
 *
 */
class BirdSpecimenFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'sample_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'species_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'frequency' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'species_id' => array('column' => 'species_id', 'unique' => 0),
			'sample_id' => array('column' => 'sample_id', 'unique' => 0)
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
			'sample_id' => 1,
			'species_id' => 1,
			'frequency' => 1
		),
	);

}
