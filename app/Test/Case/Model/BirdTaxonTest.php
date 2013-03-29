<?php
App::uses('BirdTaxon', 'Model');

/**
 * BirdTaxon Test Case
 *
 */
class BirdTaxonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bird_taxon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BirdTaxon = ClassRegistry::init('BirdTaxon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BirdTaxon);

		parent::tearDown();
	}

}
