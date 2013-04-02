<?php
App::uses('CloudCover', 'Model');

/**
 * CloudCover Test Case
 *
 */
class CloudCoverTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cloud_cover'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CloudCover = ClassRegistry::init('CloudCover');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CloudCover);

		parent::tearDown();
	}

}
