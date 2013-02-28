<?php
App::uses('SchoolsController', 'Controller');

/**
 * SchoolsController Test Case
 *
 */
class SchoolsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.school'
	);

	
	public function testCreateSchool() {
	
		$data = array(
				'School' => array(
						'school_Id' => '',
						'school_name' => 'Arizona State University',
						'address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309',
						'zipcode' => '85287',
						'city' => 'Tempe',)
		);
	
		$result = $this->testAction('/schools/createSchool',array('data' => $data, 'method' => 'post','return'=>'view'));
		$this->assertContains('<div class="error-message">School ID must be of 3 characters</div>',$result);
	}
}
