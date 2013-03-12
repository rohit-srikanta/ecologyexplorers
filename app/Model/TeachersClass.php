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

	public function createNewClass($classDetails,$id)
	{
		$this->create();
		$classDetails['TeachersClass']['date_entered'] = date('Y-m-d H:i:s');
		$classDetails['TeachersClass']['teacher'] = $id;

		if($this->save($classDetails))
		{
			return true;
		}
		else
			return false;
	}

}
