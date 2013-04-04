<?php
/**
 * BruchidSpecimenFixture
 *
 */
class BruchidSpecimenFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tree_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pod_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sample_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'hole_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'seed_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
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
			'tree_id' => 'Lorem ip',
			'pod_id' => 'Lorem ip',
			'sample_id' => 1,
			'hole_count' => 1,
			'seed_count' => 1,
			'date_entered' => '2013-04-03 21:47:32'
		),
	);

}
