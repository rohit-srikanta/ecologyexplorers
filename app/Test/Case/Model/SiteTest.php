<?php
App::uses('Site', 'Model');

/**
 * Site Test Case
 *
*/
class SiteTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
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
		$this->Site = ClassRegistry::init('Site');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Site);

		parent::tearDown();
	}

	public function testCreateNewSite()
	{
		$data = array(
				'Site' => array(
						'site_Id' => '12345',
						'site_name' => '123',
						'address' => 'ASUrite',
						'city' => 'ASUrite',
						'zipcode' => '85281',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
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
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,true);
		
		$data = array(
				'Site' => array(
						'site_Id' => '',
						'site_name' => '123',
						'address' => 'ASUrite',
						'city' => 'ASUrite',
						'zipcode' => '85281',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
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
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,false);
		
		$data = array(
				'Site' => array(
						'site_Id' => 'ASU111',
						'site_name' => '',
						'address' => 'ASUrite',
						'city' => 'ASUrite',
						'zipcode' => '85281',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
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
						'other' => '0',
						'water' => '0',
				)
		);
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,false);
		
		$data = array(
				'Site' => array(
						'site_Id' => 'ASU111',
						'site_name' => '123',
						'address' => 'ASUrite',
						'city' => 'ASUrite',
						'zipcode' => '',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
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
						'other' => '0',
						'water' => '0',
				)
		);
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,false);
		
		$data = array(
				'Site' => array(
						'site_Id' => 'ASU111',
						'site_name' => '123',
						'address' => '',
						'city' => 'ASUrite',
						'zipcode' => '85281',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
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
						'other' => '0',
						'water' => '0',
				)
		);
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,false);
		
		$data = array(
				'Site' => array(
						'site_Id' => 'ASU111',
						'site_name' => '123',
						'address' => 'ASUrite',
						'city' => '',
						'zipcode' => '85281',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
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
						'other' => '0',
						'water' => '0',
				)
		);
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,false);
		
		$data = array(
				'Site' => array(
						'site_Id' => 'ASU111',
						'site_name' => '123',
						'address' => 'ASUrite',
						'city' => 'ASUrite',
						'zipcode' => '111111111',
						'location' => 'ASUrite',
						'school_id' => '1',
						'description' => '11sdf'),
				'Habitat' => Array
				(
						'type' =>'BR',
						'recording_date' => Array
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
			
		$result = $this->Site->createNewSite($data);
		$this->assertEquals($result,false);
	}
	
	public function testCheckSiteIDExists()
	{
		//Case 1 : Positive
		$result = $this->Site->checkSiteIDExists('baseball fields');
		$this->assertEquals($result,true);
		
		//Case 2 : Negative
		$result = $this->Site->checkSiteIDExists('siteiddoesnotexists');
		$this->assertEquals($result,false );
	}
	
	public function testValidateVegetation()
	{
		$data['gravel_soil'] = 10;
		$data['lawn'] = 10;
		$data['paved_building'] = 10;
		$data['other'] = 10;
		$data['water'] = 10;
		
		$result = $this->Site->validateVegetation($data);
		$this->assertEquals($result,false);
		
		$data['gravel_soil'] = 90;
		$data['lawn'] = 10;
		$data['paved_building'] = 10;
		$data['other'] = 10;
		$data['water'] = 10;
		
		$result = $this->Site->validateVegetation($data);
		$this->assertEquals($result,true);
		
	}
	public function testGetTeachersSites()
	{
		$result = $this->Site->getTeachersSites(1);
		$conditions = array("Site.school_id" => '1');
		$expected = $this->Site->find('list', array('conditions' => $conditions,'fields' => array('Site.Id','Site.site_name')));
		$this->assertEquals($result,$expected);
		
		$result = $this->Site->getTeachersSites(null);		
		$this->assertEquals($result,false);
	}
	
	public function testGetSiteName()
	{
		$result = $this->Site->getSiteName(1);
		$conditions = array("Site.id" => '1');
		$expected = $this->Site->find('list', array('conditions' => $conditions,'fields' => array('Site.Id','Site.site_name')));
		
		$this->assertEquals($result,$expected);
	
		$result = $this->Site->getSiteName(null);
		$this->assertEquals($result,false);
	}

}
