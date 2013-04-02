<?php
App::uses('VegSample', 'Model');

/**
 * VegSample Test Case
 *
 */
class VegSampleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.veg_sample'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VegSample = ClassRegistry::init('VegSample');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VegSample);

		parent::tearDown();
	}

}
