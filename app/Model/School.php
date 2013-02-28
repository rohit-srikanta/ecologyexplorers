<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
 * @property School $School
*/
class School extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'school_Id' => array(
					'rule' => array('between', 3, 3),
					'message' => 'School ID must be of 3 characters'),
			'school_name'  => array(
					'rule' => 'notEmpty'),
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	*/
	public $hasMany = array(
			'School' => array(
					'className' => 'School',
					'foreignKey' => 'school_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);

	public function loadSchools()
	{
		$school = $this->find('list', array(
				'fields' => array(
						'School.school_Id',
						'School.school_Name')));

		return $school;
	}

	public function createSchool($fields)
	{
		$this->create();
		$fields['School']['school_id'] = strtoupper($fields['School']['school_Id']);
		$fields['School']['date_entered'] = date('Y-m-d H:i:s');
		
		if($this->save($fields))
		{	
			return true;
		}
		else
			return false;
	}
	
	public function checkSchoolIdPresent($fields = null)
	{
		if($this->findBySchoolId($fields) != null)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}

}
