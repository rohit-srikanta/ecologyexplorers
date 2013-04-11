<?php
App::uses('TeachersModel', 'Model');
//App::import('model','TeachersClass');
//App::import('model','Site');
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
			'app.school',
			'app.site',
			'app.TeachersClass'
	);

	public function setUp() {
		parent::setUp();
		$this->Teacher = ClassRegistry::init('Teacher');
		$this->Site = ClassRegistry::init('Site');
		$this->TeachersClass = ClassRegistry::init('TeachersClass');
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
		$this->assertEquals($result,false);

	}

	public function testValidateLogin()
	{
		//Case 1 : Positive
		$result = $this->Teacher->validateLogin('rohit@asu.edu','rohit');
		
		$conditions = array("Teacher.email_address" => "rohit@asu.edu");
		$expected = $this->Teacher->find('first', array('conditions' => $conditions));
		
		
		$this->assertEquals($result, $expected);
		
		$result = $this->Teacher->validateLogin('temp@asu.edu','rohit');
		$this->assertEquals($result,"pending");

		
		//Case 2 : Negative
		$result = $this->Teacher->validateLogin('rohit@asu.edu','rohit2');

		$expected = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'id' => '1',
						'email_address' => 'rohit@asu.edu',
						'type' => 'A',
						'name' => 'Rohit Srikanta',
						'school_id' => '1'
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
						'school_id' => '1'
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
						'school_id' => '1'
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
						'school_id' => '1'
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
						'school_id' => '1'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 4 : Negative
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'email_address' => 'asdsad@asu.edu',
						'name' => '',
						'school_id' => '1'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 5 : Negative
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school_id' => ''));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,false);

		//Case 6 : Positive
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('ASUrite'),
						'email_address' => 'asu@asu.edu',
						'name' => 'ASUrite',
						'school_id' => '3'));
			
		$result = $this->Teacher->createUser($data);
		$this->assertEquals($result,true);
	}

	public function testGetUsers()
	{
		$result = $this->Teacher->getUsers();

		$conditions = array("Teacher.type" => "P");
		$expected = $this->Teacher->find('all', array('conditions' => $conditions));
		$expected1 = $this->Teacher->associateSchoolNames($expected);

		$this->assertEquals($result,$expected1);
	}

	public function testApproveUser()
	{
		$data = array(
				'Teacher' => array(
						'password' => Security::hash('rohit'),
						'email_address' => 'tempUser@asu.edu',
						'name' => 'Temp Srikanta',
						'school_id' => '1'
				));
		
		$this->Teacher->save($data);
		
		$result = $this->Teacher->approveUser($this->Teacher->getInsertID(),'T');
		$this->assertEquals($result,true);
		
		$result = $this->Teacher->approveUser('0','T');
		$this->assertEquals($result,false);
	}
	
	public function testGetUserDetails()
	{
		$conditions = array("Teacher.email_address" => "rohit@asu.edu");
		$expected = $this->Teacher->find('first', array('conditions' => $conditions));
		
		$result = $this->Teacher->getUserDetails($expected['Teacher']['id']);
		$this->assertEquals($result,$expected);
	}
	
	public function testUserList()
	{
		$query = $this->Teacher->find('all',array('conditions' => array('NOT' => array('Teacher.id' => '1'))));
		$expected = ($this->Teacher->associateSchoolNames($query));
		
		$user['Teacher']['id'] = '1';
		$result = $this->Teacher->userList($user);
		
		$this->assertEquals($result,$expected);
		
		
		$query = $this->Teacher->find('all',array('conditions' => array('NOT' => array('Teacher.id' => '10'))));
		$expected = ($this->Teacher->associateSchoolNames($query));
		
		$user['Teacher']['id'] = '10';
		$result = $this->Teacher->userList($user);
		
		$this->assertEquals($result,$expected);
		
		
		$result = $this->Teacher->userList(null);
		$this->assertEquals($result,null);
		
	}
	
	public function testSaveModification()
	{
		$result = $this->Teacher->saveModification(null);
		$this->assertEquals($result,false);
		
		$query = $this->Teacher->find('first',array('conditions' => array('Teacher.id' => '1'),'fields' => array('Teacher.id','Teacher.password','Teacher.email_address','Teacher.name','Teacher.school_id')));
		$data = array(
				'Teacher' => array(
						'id' => '1',
						'password' => 'rohit',
						'email_address' => 'rohit@asu.edu',
						'name' => 'Temp Srikanta',
						'school_id' => '1'
				));
		$result = $this->Teacher->saveModification($data);
		$query = $this->Teacher->find('first',array('conditions' => array('Teacher.id' => '1'),'fields' => array('Teacher.id','Teacher.password','Teacher.email_address','Teacher.name','Teacher.school_id')));
		$data['Teacher']['password'] = Security::hash('rohit');
		$this->assertEquals($data,$query);
	}
	
	public function testUserResetPassword()
	{
		$result = $this->Teacher->userResetPassword(1);
		$this->assertEquals($result,true);
		
		$result = $this->Teacher->userResetPassword(10);
		$this->assertEquals($result,false);
		
		$result = $this->Teacher->userResetPassword(null);
		$this->assertEquals($result,false);
	}
	
	public function testGetSiteIDs()
	{
	
		$user['Teacher']['school_id'] = '1';
		$result = $this->Teacher->getSiteIDs($user);
		$expected = $this->Site->getTeachersSites($user['Teacher']['school_id']);
		$this->assertEquals($result,$expected);
		
		$user['Teacher']['school_id'] = '0';
		$result = $this->Teacher->getSiteIDs($user);
		$expected = $this->Site->getTeachersSites($user['Teacher']['school_id']);
		$this->assertEquals($result,$expected);
		
		$result = $this->Teacher->getSiteIDs(null);
		$expected = $this->Site->getTeachersSites(null);
		$this->assertEquals($result,$expected);
	}
	
	public function testGetClassIDs()
	{		
		$user['Teacher']['school_id'] = '1';
		$user['Teacher']['id'] = '1';
		$result = $this->Teacher->getClassIDs($user);
		$expected = $this->TeachersClass->getClassIDs($user['Teacher']['school_id'],$user['Teacher']['id']);
		$this->assertEquals($result,$expected);

		$user['Teacher']['school_id'] = '0';
		$user['Teacher']['id'] = '0';
		$result = $this->Teacher->getClassIDs($user);
		$expected = $this->TeachersClass->getClassIDs($user['Teacher']['school_id'],$user['Teacher']['id']);
		$this->assertEquals($result,$expected);
		
		$result = $this->Teacher->getClassIDs(null,null);
		$this->assertEquals($result,false);
		
	}
	
	public function testDeleteTeacher()
	{

		$result = $this->Teacher->deleteTeacher(null);
		$this->assertEquals($result,false);
		
		$result = $this->Teacher->deleteTeacher(50);
		$this->assertEquals($result,false);
		
		$beforeCount = ($this->Teacher->find('count'));
		$result = $this->Teacher->deleteTeacher(3);
		$afterCount = ($this->Teacher->find('count'));
		$this->assertEquals($beforeCount,($afterCount+1));
		
		$beforeCount = ($this->Teacher->find('count'));
		$result = $this->Teacher->deleteTeacher(1);
		$afterCount = ($this->Teacher->find('count'));
		$this->assertEquals($beforeCount,($afterCount+1));
		
	}
}
