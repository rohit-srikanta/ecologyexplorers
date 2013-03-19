<?php
App::uses('ArthroSpeciman', 'Model');

/**
 * ArthroSpeciman Test Case
 *
 */
class ArthroSpecimanTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArthroSpeciman = ClassRegistry::init('ArthroSpeciman');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArthroSpeciman);

		parent::tearDown();
	}

}
