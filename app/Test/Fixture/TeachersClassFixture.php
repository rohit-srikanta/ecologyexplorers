<?php
/**
 * SiteFixture
 *
 */
class TeachersClassFixture extends CakeTestFixture {

public $import = array(
			'table' => 'teachers_classes', 
			'connection' => 'default');

public $records = array(
		array('id' => '1','class_name' => 'Mr. Smith Grade 12','grade' => '12','school' => '1','teacher_id' => '1','school' => '1'),
		array('id' => '2','class_name' => 'Mr. Jones Grade 10','grade' => '10','school' => '1','teacher_id' => '2','school' => '2'),
);
}
