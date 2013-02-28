<?php
App::uses('TeachersController', 'Controller');

/**
 * TeachersController Test Case
 *
*/
class TeachersControllerTest extends ControllerTestCase {

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

	public function testLogin() {

		$data = array(
				'Teacher' => array(
						'username' => 'rohit',
						'password' => 'rohit',));

		$result = $this->testAction('/teachers/login',array('data' => $data, 'method' => 'post','return'=>'view'));
		$this->assertNull($result);
	}

	public function testRegister() {

		$data = array(
				'Teacher' => array(
						'username' => 'rohit29',
						'password' => 'rohit29',
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school' => 'ASU'));

		$result = $this->testAction('/teachers/register',array('data' => $data, 'method' => 'post','return'=>'view'));
		$this->assertNull($result);

		$data = array(
				'Teacher' => array(
						'username' => 'rohit',
						'password' => 'rohit',
						'email_address' => 'asdsad@asu.edu',
						'name' => 'Rohit',
						'school' => 'ASU'));

		$result = $this->testAction('/teachers/register',array('data' => $data, 'method' => 'post','return'=>'view'));
		$this->assertContains('id="TeacherRegisterForm"',$result);
	}
}
?>



