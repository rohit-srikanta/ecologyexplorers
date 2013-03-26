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
	
	public function testGetHabitatDetails()
	{
		$result = $this->Habitat->getHabitatDetails(null,null);
		$this->assertEquals($result,false);
		
		$result = $this->Habitat->getHabitatDetails(null,'AR');
		$this->assertEquals($result,false);
		
		$result = $this->Habitat->getHabitatDetails(1,'AR');
		$conditions = array("Habitat.site_id" => 1,"Habitat.type" => 'AR');
		$expected = $this->Habitat->find('first', array('conditions' => $conditions));
		$this->assertEquals($result,$expected);		
		
	}
	
	public function testCreateHabitat()
	{
		$result = $this->Habitat->createHabitat(null,null);
		$this->assertEquals($result,false);
		
		$data = array(
				'Habitat' => array
				(
						'type' =>'AR',
						'recording_date' => array
						(
								'month' => '03',
								'day' => '25',
								'year' => '2013',
						),
						'num_traps' => '0',
						'trap_arrange' => 'Line',
						'area' =>'',
						'percent_observed' => '0',
						'radius' => '0',
						'tree_canopy' => '0',
						'scrub_cover' => '0',
						'gravel_soil' => '0',
						'lawn' => '0',
						'paved_building' => '0',
						'other' => '0',
						'water' => '0',
				)
		);
		
		$result = $this->Habitat->createHabitat($data['Habitat'],'1');
		$this->assertEquals($result,true);
		
		$data = array(
				'Habitat' => array
				(
						'type' =>'BI',
						'recording_date' => array
						(
								'month' => '03',
								'day' => '25',
								'year' => '2013',
						),
						'num_traps' => '0',
						'trap_arrange' => 'Line',
						'area' =>'',
						'percent_observed' => '0',
						'radius' => '0',
						'tree_canopy' => '0',
						'scrub_cover' => '0',
						'gravel_soil' => '0',
						'lawn' => '0',
						'paved_building' => '0',
						'other' => '10',
						'water' => '10',
				)
		);
		
		$result = $this->Habitat->createHabitat($data['Habitat'],'1');
		$this->assertEquals($result,true);
		
		$data = array(
				'Habitat' => array
				(
						'type' =>'BR',
						'recording_date' => array
						(
								'month' => '03',
								'day' => '25',
								'year' => '2013',
						),
						'num_traps' => '0',
						'trap_arrange' => 'Line',
						'area' =>'',
						'percent_observed' => '0',
						'radius' => '0',
						'tree_canopy' => '10',
						'scrub_cover' => '0',
						'gravel_soil' => '0',
						'lawn' => '0',
						'paved_building' => '0',
						'other' => '10',
						'water' => '0',
				)
		);
		
		$result = $this->Habitat->createHabitat($data['Habitat'],'1');
		$this->assertEquals($result,true);
		
		$data = array(
				'Habitat' => array
				(
						'type' =>'VE',
						'recording_date' => array
						(
								'month' => '03',
								'day' => '25',
								'year' => '2013',
						),
						'num_traps' => '0',
						'trap_arrange' => 'Line',
						'area' =>'',
						'percent_observed' => '0',
						'radius' => '0',
						'tree_canopy' => '10',
						'scrub_cover' => '0',
						'gravel_soil' => '0',
						'lawn' => '0',
						'paved_building' => '0',
						'other' => '0',
						'water' => '0',
				)
		);
		
		$result = $this->Habitat->createHabitat($data['Habitat'],'1');
		$this->assertEquals($result,true);
		
		$data = array(
				'Habitat' => array
				(
						'type' =>'',
						'recording_date' => array
						(
								'month' => '03',
								'day' => '25',
								'year' => '2013',
						),
						'num_traps' => '0',
						'trap_arrange' => 'Line',
						'area' =>'',
						'percent_observed' => '0',
						'radius' => '0',
						'tree_canopy' => '0',
						'scrub_cover' => '10',
						'gravel_soil' => '10',
						'lawn' => '0',
						'paved_building' => '0',
						'other' => '10',
						'water' => '0',
				)
		);
		
		$result = $this->Habitat->createHabitat($data['Habitat'],'1');
		$this->assertEquals($result,true);
	}

}
