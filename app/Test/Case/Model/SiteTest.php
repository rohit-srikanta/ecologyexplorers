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
			'app.site'
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
						'site_Id' => 'ASU111',
						'site_name' => '123',
						'address' => 'ASUrite',
						'city' => 'ASUrite',
						'zipcode' => '85281',
						'location' => 'ASUrite',
						'school' => '1',
						'description' => '11sdf')
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
						'school' => '1',
						'description' => '11sdf')
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
						'school' => '1',
						'description' => '11sdf')
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
						'school' => '1',
						'description' => '11sdf')
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
						'school' => '1',
						'description' => '11sdf')
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

}
