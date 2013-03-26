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

	public function testGetClassIDs()
	{
		$result = $this->TeachersClass->getClassIDs(null,null);
		$this->assertEquals($result,false);

		$result = $this->TeachersClass->getClassIDs(1,1);
		$conditions = array("TeachersClass.school" => '1',"TeachersClass.teacher_id" => '1');
		$expected = $this->TeachersClass->find('list', array('conditions' => $conditions,'fields' => array('TeachersClass.Id','TeachersClass.class_name')));
		$this->assertEquals($result,$expected);

		$result = $this->TeachersClass->getClassIDs(100,100);
		$conditions = array("TeachersClass.school" => '100',"TeachersClass.teacher_id" => '100');
		$expected = $this->TeachersClass->find('list', array('conditions' => $conditions,'fields' => array('TeachersClass.Id','TeachersClass.class_name')));
		$this->assertEquals($result,$expected);
	}
	
	public function testGetClassName()
	{
		$result = $this->TeachersClass->getClassName(null);
		$this->assertEquals($result,false);
		
		$result = $this->TeachersClass->getClassName(1);
		$conditions = array("TeachersClass.id" => '1');
		$expected = $this->TeachersClass->find('list', array('conditions' => $conditions,'fields' => array('TeachersClass.Id','TeachersClass.class_name')));
		$this->assertEquals($result,$expected);
		
		$result = $this->TeachersClass->getClassName(100);
		$conditions = array("TeachersClass.id" => '100');
		$expected = $this->TeachersClass->find('list', array('conditions' => $conditions,'fields' => array('TeachersClass.Id','TeachersClass.class_name')));
		$this->assertEquals($result,$expected);
	}
}