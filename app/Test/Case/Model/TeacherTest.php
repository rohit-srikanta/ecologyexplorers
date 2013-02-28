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

	public function testCheckUsernameExists()
	{
		//Case 1 : Positive
		$result = $this->Teacher->checkUsernameExists('rohit');
		$this->assertEquals($result,true);

		//Case 2 : Negative
		$result = $this->Teacher->checkUsernameExists('notUserName');
		$this->assertEquals($result,false );
	}

	public function testValidateLogin()
	{
		//Case 1 : Positive
		$result = $this->Teacher->validateLogin('rohit','rohit');
		$expected = array(
				'Teacher' => array(
						'password' => 'rohit',
						'id' => '1',
						'username' => 'rohit',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => 'ASU'
				)
		);
		$this->assertEquals($result, $expected);

		//Case 2 : Negative
		$result = $this->Teacher->validateLogin('rohit','rohit2');

		$expected = array(
				'Teacher' => array(
						'password' => 'rohit',
						'id' => '1',
						'username' => 'rohit',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => 'ASU'
				)
		);
		$this->assertNotEqual($result, $expected,'Incorrect Login');

		//Case 3 : Negative
		$result = $this->Teacher->validateLogin('rohit','');
		$expected = array(
				'Teacher' => array(
						'password' => 'rohit',
						'id' => '1',
						'username' => 'rohit',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => 'ASU'
				)
		);
		$this->assertNotEqual($result, $expected,'Incorrect Login');

		//Case 4 : Negative
		$result = $this->Teacher->validateLogin('','rohit2999');
		$expected = array(
				'Teacher' => array(
						'password' => 'rohit',
						'id' => '1',
						'username' => 'rohit',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => 'ASU'
				)
		);
		$this->assertNotEqual($result, $expected,'Incorrect Login');

		//Case 5 : Negative
		$result = $this->Teacher->validateLogin('','');
		$expected = array(
				'Teacher' => array(
						'password' => 'rohit',
						'id' => '1',
						'username' => 'rohit',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school' => 'ASU'
				)
		);
		$this->assertNotEqual($result, $expected,'Incorrect Login');
	}

	public function testCreateUser()
	{
		//Case 1 : Negative
		$data = array(
				'Teacher' => array(
						'username' => 'rohit',
						'password' => 'rohit',
						'email_address' => 'asdsad',
						'name' => 'Rohit',
						'school' => 'ASU'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 2 : Negative
		$data = array(
				'Teacher' => array(
						'username' => '',
						'password' => 'rohit',
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school' => 'ASU'));

		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 3 : Negative
		$data = array(
				'Teacher' => array(
						'username' => 'rohit',
						'password' => '',
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school' => 'ASU'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 4 : Negative
		$data = array(
				'Teacher' => array(
						'username' => 'rohit',
						'password' => 'rohit',
						'email_address' => 'asdsad@asu.edu',
						'name' => '',
						'school' => 'ASU'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 5 : Negative
		$data = array(
				'Teacher' => array(
						'username' => 'rohit',
						'password' => 'rohit',
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school' => ''));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 6 : Positive
		$data = array(
				'Teacher' => array(
						'username' => 'testing',
						'password' => 'testing',
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Test',
						'school' => 'USC'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,true);
	}

	public function testGetUsers()
	{
		$result = $this->Teacher->getUsers();

		$conditions = array("Teacher.type" => "-");
		$expected = $this->Teacher->find('all', array('conditions' => $conditions));

		$this->assertEquals($result,$expected);
	}

	public function testApproveUser()
	{
		$result = $this->Teacher->approveUser('1','T');
		$this->assertEquals($result,null);
	}
}
