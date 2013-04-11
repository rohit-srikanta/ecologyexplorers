<?php
App::uses('AppModel', 'Model');
/**
 * Teacher Model
 *
*/
class TeachersClass extends AppModel {

	public $recursive = -1;

	public $validate = array(
			'grade' => array(
					'rule' => 'notEmpty'),
			'class_name'  => array(
					'rule' => 'notEmpty')
	);
	
	public $hasMany = array(
			'BirdSample' => array(
					'className' => 'BirdSample',
			));
	
	public $belongsTo = array(
			'Teacher' => array(
					'className' => 'Teacher',
					'foreignKey' => 'teacher_id',
			),
			'School' => array(
					'className' => 'School',
					'foreignKey'   => 'school_id',
			),
	);

	public function createNewClass($classDetails,$id)
	{
		$this->create();
		$classDetails['TeachersClass']['date_entered'] = date('Y-m-d H:i:s');
		$classDetails['TeachersClass']['teacher_id'] = $id;

		if($this->save($classDetails))
		{
			return true;
		}
		else
			return false;
	}
	
	public function getClassIDs($schoolId,$teacherId)
	{
		if($schoolId == null || $teacherId == null)
			return false;
		$conditions = array("TeachersClass.school_id" => $schoolId,"TeachersClass.teacher_id" => $teacherId);
		$class = $this->find('list', array('conditions' => $conditions,'fields' => array('TeachersClass.Id','TeachersClass.class_name')));
		return $class;
	}
	
	public function getClassName($classId)
	{
		if($classId == null )
			return false;
		$conditions = array("TeachersClass.id" => $classId);
		$class = $this->find('list', array('conditions' => $conditions,'fields' => array('TeachersClass.Id','TeachersClass.class_name')));
		return $class;
	}

}
