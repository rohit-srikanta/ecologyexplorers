<?php
App::uses('ArthroTaxon', 'Model');

/**
 * ArthroTaxon Test Case
 *
 */
class ArthroTaxonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arthro_taxon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArthroTaxon = ClassRegistry::init('ArthroTaxon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArthroTaxon);

		parent::tearDown();
	}

}
