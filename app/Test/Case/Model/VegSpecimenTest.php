<?php
App::uses('VegSpecimen', 'Model');

/**
 * VegSpecimen Test Case
 *
 */
class VegSpecimenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.veg_specimen'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VegSpecimen = ClassRegistry::init('VegSpecimen');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VegSpecimen);

		parent::tearDown();
	}

}
