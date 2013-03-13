<?php
App::uses('TeachersClass', 'Model');

/**
 * TeachersClass Test Case
 *
*/
class TeachersClassTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
			'app.teachers_class'
	);

	/**
	 * setUp method
	 *
	 * @return void
	*/
	public function setUp() {
		parent::setUp();
		$this->TeachersClass = ClassRegistry::init('TeachersClass');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->TeachersClass);

		parent::tearDown();
	}

	public function testCreateNewClass()
	{
		$data = array(
				'TeachersClass' => array(
						'class_name' => 'Class name',
						'grade' => '12',
						'school' => '1')
		);
			
		$result = $this->TeachersClass->createNewClass($data,'1');
		$this->assertEquals($result,true);
		
		
		$data = array(
				'TeachersClass' => array(
						'class_name' => 'Class name',
						'grade' => '12',
						'school' => '1')
		);
			
		$result = $this->TeachersClass->createNewClass($data,'1');
		$this->assertEquals($result,true);
		
		$data = array(
				'TeachersClass' => array(
						'class_name' => 'Class name',
						'grade' => '',
						'school' => '1')
		);
			
		$result = $this->TeachersClass->createNewClass($data,'1');
		$this->assertEquals($result,false);
		
		$data = array(
				'TeachersClass' => array(
						'class_name' => '',
						'grade' => '12',
						'school' => '1')
		);
			
		$result = $this->TeachersClass->createNewClass($data,'1');
		$this->assertEquals($result,false);
	}
}