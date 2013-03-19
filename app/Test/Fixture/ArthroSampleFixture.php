<?php
/**
 * ArthroSampleFixture
 *
 */
class ArthroSampleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'site_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'habitat_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'sample_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'comments' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'observer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'sample_date' => '2013-03-18 23:08:58',
			'comments' => 'Lorem ipsum dolor sit amet',
			'date_entered' => '2013-03-18 23:08:58',
			'observer' => 'Lorem ipsum dolor sit amet'
		),
	);

}
