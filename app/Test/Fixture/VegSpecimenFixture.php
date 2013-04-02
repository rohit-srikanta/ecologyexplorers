<?php
/**
 * VegSpecimenFixture
 *
 */
class VegSpecimenFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'sample_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'plant_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 6, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'species_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'circumference' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '15,5'),
		'canopy' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '15,5'),
		'height' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '15,5'),
		'comments' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'plant_type' => 'Lore',
			'species_id' => 1,
			'circumference' => 1,
			'canopy' => 1,
			'height' => 1,
			'comments' => 'Lorem ipsum dolor sit amet',
			'date_entered' => '2013-04-01 22:43:26'
		),
	);

}
