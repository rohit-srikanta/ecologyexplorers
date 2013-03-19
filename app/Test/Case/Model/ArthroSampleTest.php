<?php
App::uses('ArthroSample', 'Model');

/**
 * ArthroSample Test Case
 *
 */
class ArthroSampleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arthro_sample',
		'app.site',
		'app.habitat'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArthroSample = ClassRegistry::init('ArthroSample');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArthroSample);

		parent::tearDown();
	}

}
