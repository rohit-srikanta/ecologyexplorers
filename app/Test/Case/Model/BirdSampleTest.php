<?php
App::uses('BirdSample', 'Model');

/**
 * BirdSample Test Case
 *
 */
class BirdSampleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bird_sample'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BirdSample = ClassRegistry::init('BirdSample');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BirdSample);

		parent::tearDown();
	}

}
