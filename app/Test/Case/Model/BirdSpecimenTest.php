<?php
App::uses('BirdSpecimen', 'Model');

/**
 * BirdSpecimen Test Case
 *
 */
class BirdSpecimenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bird_specimen'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BirdSpecimen = ClassRegistry::init('BirdSpecimen');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BirdSpecimen);

		parent::tearDown();
	}

}
