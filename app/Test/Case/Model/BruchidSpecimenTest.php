<?php
App::uses('BruchidSpecimen', 'Model');

/**
 * BruchidSpecimen Test Case
 *
 */
class BruchidSpecimenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bruchid_specimen'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BruchidSpecimen = ClassRegistry::init('BruchidSpecimen');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BruchidSpecimen);

		parent::tearDown();
	}

}
