<?php
App::uses('BruchidSample', 'Model');

/**
 * BruchidSample Test Case
 *
 */
class BruchidSampleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bruchid_sample'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BruchidSample = ClassRegistry::init('BruchidSample');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BruchidSample);

		parent::tearDown();
	}

}
