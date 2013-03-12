<?php
App::uses('TeachersModel', 'Model');

/**
 * TeachersModel Test Case
 *
*/
class TeachersTest extends CakeTestCase  {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
			'app.teacher',
			'app.school'
	);

	public function setUp() {
		parent::setUp();
		$this->Teacher = ClassRegistry::init('Teacher');
	}

	public function tearDown() {
		unset($this->Teacher);
		parent::tearDown();
	}

	public function testCheckEmailAddressExists()
	{
		//Case 1 : Positive
		$result = $this->Teacher->checkEmailAddressExists('rohit@asu.edu');
		$this->assertEquals($result,true);

		//Case 2 : Negative
		$result = $this->Teacher->checkEmailAddressExists('notUserName');
		$this->assertEquals($result,false );
	}

	public function testValidateLogin()
	{
		//Case 1 : Positive
		$result = $this->Teacher->validateLogin('rohit@asu.edu','rohit');
		$expected = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'id' => '1',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => '1'
				),
				'School' => array(
						'school_name' => 'Arizona State University'
				));

		$this->assertEquals($result, $expected);

		//Case 2 : Negative
		$result = $this->Teacher->validateLogin('rohit@asu.edu','rohit2');

		$expected = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'id' => '1',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => '1'
				),
				'School' => array(
						'school_name' => 'Arizona State University'
				));
		$this->assertNotEqual($result, $expected,'Incorrect Login');

		//Case 3 : Negative
		$result = $this->Teacher->validateLogin('rohit','');
		$expected = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'id' => '1',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => '1'
				)
		);
		$this->assertNotEqual($result, $expected,'Incorrect Login');

		//Case 4 : Negative
		$result = $this->Teacher->validateLogin('','rohit2999');
		$expected = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'id' => '1',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => '1'
				),
				'School' => array(
						'school_name' => 'Arizona State University'
				));
		$this->assertNotEqual($result, $expected,'Incorrect Login');

		//Case 5 : Negative
		$result = $this->Teacher->validateLogin('','');
		$expected = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'id' => '1',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => '1'
				),
				'School' => array(
						'school_name' => 'Arizona State University'
				));
		$this->assertNotEqual($result, $expected,'Incorrect Login');
	}

	public function testCreateUser()
	{
		//Case 1 : Negative
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'email_address' => 'asdsad',
						'name' => 'Rohit',
						'school' => '1'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 4 : Negative
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'email_address' => 'asdsad@asu.edu',
						'name' => '',
						'school' => '1'),
				'School' => array(
						'school_name' => 'Arizona State University'
				));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 5 : Negative
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school' => ''),
				'School' => array(
						'school_name' => 'Arizona State University'
				));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 6 : Positive
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('ASUrite'),
						'email_address' => 'asu@asu.edu',
						'name' => 'ASUrite',
						'school' => '3'),
				'School' => array(
						'school_name' => 'Arizona State University'
				));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,true);
	}

	public function testGetUsers()
	{
		$result = $this->Teacher->getUsers();

		$conditions = array("Teacher.type" => "P");
		$expected = $this->Teacher->find('all', array('conditions' => $conditions));

		$this->assertEquals($result,$expected);
	}

	public function testApproveUser()
	{
		$result = $this->Teacher->approveUser('1','T');
		$this->assertEquals($result,null);
	}
}
