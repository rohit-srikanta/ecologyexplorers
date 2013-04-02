<?php
/**
 * VegSampleFixture
 *
 */
class VegSampleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tree_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'cactus_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'collection_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'observer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'shrub_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'site_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'habitat_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'site_id' => array('column' => 'site_id', 'unique' => 0),
			'habitat_id' => array('column' => 'habitat_id', 'unique' => 0)
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
			'tree_count' => 1,
			'cactus_count' => 1,
			'collection_date' => '2013-04-01',
			'observer' => 'Lorem ipsum dolor sit amet',
			'shrub_count' => 1,
			'date_entered' => '2013-04-01 22:43:17',
			'site_id' => 1,
			'habitat_id' => 1
		),
	);

}
