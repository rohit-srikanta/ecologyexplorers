<?php
/**
 * BirdSampleFixture
 *
 */
class BirdSampleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'site_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'habitat_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'observer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'collection_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'time_start' => array('type' => 'time', 'null' => true, 'default' => null),
		'time_end' => array('type' => 'time', 'null' => true, 'default' => null),
		'air_temp' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'temp_units' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cloud_cover' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1),
		'comments' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'site_id' => 1,
			'habitat_id' => 1,
			'observer' => 'Lorem ipsum dolor sit amet',
			'collection_date' => '2013-03-28',
			'time_start' => '22:17:07',
			'time_end' => '22:17:07',
			'air_temp' => 1,
			'temp_units' => 'Lorem ipsum dolor sit ame',
			'cloud_cover' => 1,
			'comments' => 'Lorem ipsum dolor sit amet',
			'date_entered' => '2013-03-28 22:17:07'
		),
	);

}
