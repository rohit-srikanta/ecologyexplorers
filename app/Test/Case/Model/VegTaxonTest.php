<?php
App::uses('VegTaxon', 'Model');

/**
 * VegTaxon Test Case
 *
 */
class VegTaxonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.veg_taxon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VegTaxon = ClassRegistry::init('VegTaxon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VegTaxon);

		parent::tearDown();
	}

}
