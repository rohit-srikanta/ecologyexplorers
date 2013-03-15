<?php
App::uses('Habitat', 'Model');

/**
 * Habitat Test Case
 *
 */
class HabitatTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.habitat'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Habitat = ClassRegistry::init('Habitat');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Habitat);

		parent::tearDown();
	}

}
