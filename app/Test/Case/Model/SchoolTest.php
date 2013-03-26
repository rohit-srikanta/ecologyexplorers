<?php
App::uses('TeachersModel', 'Model');


class SchoolTest extends CakeTestCase  {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
			'app.school'
	);

	public function setUp() {
		parent::setUp();
		$this->School = ClassRegistry::init('School');
	}

	public function tearDown() {
		unset($this->School);
		parent::tearDown();
	}

	public function testloadSchools()
	{
		$result = $this->School->loadSchools();
		$expected =  $this->School->find('list', array(
												'fields' => array(
												'School.Id',
												'School.school_Name')));

		$this->assertEquals($result,$expected);
	}

	public function testCheckSchoolIdPresent()
	{
		//Case 1 : Positive
		$result = $this->School->CheckSchoolIdPresent('ASU');
		$this->assertEquals($result,true);

		//Case 2 : Negative
		$result = $this->School->CheckSchoolIdPresent('notSchool');
		$this->assertEquals($result,false );
	}

	public function testCreateSchool()
	{
		//Case 1 : Positive
		$data = array(
				'School' => array(
						'school_Id' => 'NCU',
						'school_name' => 'North Carolina',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '78965',
						'city' => 'Tempe',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,true);

		//Case 3 : Negative
		$data = array(
				'School' => array(
						'school_Id' => 'ASU',
						'school_name' => 'Arizona State University',
						'address' => '',
						'zipcode' => '',
						'city' => '',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);

		//Case 4 : Negative
		$data = array(
				'School' => array(
						'school_Id' => 'ASUTempe',
						'school_name' => 'Arizona State University',
						'address' => '',
						'zipcode' => '',
						'city' => '',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);

		//Case 5 : Negative
		$data = array(
				'School' => array(
						'school_Id' => 'ASUTempe',
						'school_name' => 'Arizona State University',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '85287',
						'city' => 'Tempe',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);

		//Case 6 : Negative
		$data = array(
				'School' => array(
						'school_Id' => 'SU',
						'school_name' => 'Arizona State University',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '85287',
						'city' => 'Tempe',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);

		//Case 7 : Negative
		$data = array(
				'School' => array(
						'school_Id' => '',
						'school_name' => 'Arizona State University',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '85287',
						'city' => 'Tempe',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);

		//Case 8 : Negative
		$data = array(
				'School' => array(
						'school_Id' => 'ASU',
						'school_name' => '',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '85287',
						'city' => 'Tempe',)
		);
		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);
		
		//Case 8 : Negative
		$data = array(
				'School' => array(
						'school_Id' => 'ASU',
						'school_name' => 'Arizona State University',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '1',
						'city' => 'Tempe',)
		);

		$result = $this->School->createSchool($data);
		$this->assertEquals($result,false);
	}
	
	public function testSchoolWithID()
	{
		$result = $this->School->schoolWithID(1);
		$expected = array(
				'0' => array(
						'value' => '1',
						'name' => 'Arizona State University')
		);
		
		$this->assertEquals($result,$expected);
		
		$result = $this->School->schoolWithID(null);
		$this->assertEquals($result,false);
		
		$result = $this->School->schoolWithID(599900000);		
		$this->assertEquals($result,false);
	}
}
?>