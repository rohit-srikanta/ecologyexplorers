<?php
/**
 * BruchidSampleFixture
 *
 */
class BruchidSampleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'site_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tree_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'location' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'observer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'collection_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'site_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'site_id' => array('column' => 'site_id', 'unique' => 0)
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
			'site_type' => 'Lorem ipsum dolor ',
			'tree_type' => 'Lorem ip',
			'location' => 'Lorem ipsum dolor sit amet',
			'observer' => 'Lorem ipsum dolor sit amet',
			'collection_date' => '2013-04-03',
			'date_entered' => '2013-04-03 21:47:21',
			'site_id' => 1
		),
	);

}
