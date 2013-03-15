<?php
/**
 * HabitatFixture
 *
 */
class HabitatFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'habitat';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'recording_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'area' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'shrubcover' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'tree_canopy' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'lawn' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'other' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'paved_building' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'gravel_soil' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'water' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'num_traps' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'trap_arrange' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'percent_observed' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'radius' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'date_entered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'site_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'school_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'school_id' => array('column' => 'school_id', 'unique' => 0),
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
			'type' => '',
			'recording_date' => '2013-03-13 22:03:38',
			'area' => 1,
			'shrubcover' => 1,
			'tree_canopy' => 1,
			'lawn' => 1,
			'other' => 1,
			'paved_building' => 1,
			'gravel_soil' => 1,
			'water' => 1,
			'num_traps' => 1,
			'trap_arrange' => 'Lorem ipsum dolor sit amet',
			'percent_observed' => 1,
			'radius' => 1,
			'date_entered' => '2013-03-13 22:03:38',
			'site_id' => 1,
			'school_id' => 1
		),
	);

}
