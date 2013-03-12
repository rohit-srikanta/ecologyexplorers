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
					'rule' => 'notEmpty')
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	*/

	public $recursive = -1;

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

	//This method is called from the teachers controller to load the schools during user registration.
	public function loadSchools()
	{
		$school = $this->find('list', array(
				'fields' => array(
						'School.Id',
						'School.school_Name')));

		return $school;
	}

	public function schoolOptions()
	{
		$schools = $this->loadSchools();
	
		$i = 0;
		foreach ($schools as $k)
		{
			$schooloptions[$i]['name'] = ($k);
			$schooloptions[$i]['value'] = array_search($k,$schools);
			$i++;
		}
		return $schooloptions;
	}

	public function schoolWithID($schoolID)
	{
		$schools = $this->loadSchools();
		$i = 0;
		foreach ($schools as $k)
		{
			if($schoolID == array_search($k,$schools))
			{
				$schooloptions[$i]['name'] = ($k);
				$schooloptions[$i]['value'] = array_search($k,$schools);
			}
			$i++;
		}
		return $schooloptions;
	}

	//This method is called from the School Controller to create new schools
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

	//This method is used to validate if the school id given already exists
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
