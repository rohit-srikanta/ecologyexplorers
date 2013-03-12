<?php
App::uses('AppModel', 'Model');
App::uses('Security','Utitlity');
/**
 * Teacher Model
 *
*/
class Teacher extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'password' => array(
					'notempty' => array(
							'rule' => array('notempty'),
					),
			),
			'email_address' => array(
					'rule' => 'email',
					'message' => 'Please enter a valid email address'),
			'name' => array(
					'rule' => 'notEmpty'),
			'school' => array(
					'rule' => 'notEmpty')
	);


	public $hasOne = array(
			'School' => array(
					'className'    => 'School',
					'conditions'   => array('School.id = Teacher.school'),
					'fields'       => 'School.school_name',
					//'dependent'    => true,
					'foreignKey'   => 'id'
			)
	);
	
	public $recursive = -1;

	//Method to check if the given email address and password exists in the database.
	public function validateLogin($emailAddress = null,$password = null)
	{
		$password1 = Security::hash($password);
		$user = $this->findByemailAddressAndPassword($emailAddress,$password1);
		if($user)
		{
			if('P' != $user['Teacher']['type'])
			{
				return $user;
			}
			else
				return "pending";
		}

	}

	//Method to check if the email address already exists in the database.
	public function checkEmailAddressExists($fields = null)
	{
		if($this->findByemailAddress($fields) != null)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	//Method to insert new profiles into the database
	public function createUser($fields)
	{
		$this->create();

		$fields['Teacher']['password'] = Security::hash($fields['Teacher']['password']);
		pr($fields);

		if($this->save($fields))
			return true;
		else
			return false;
	}

	public function approveUser($id,$value)
	{
		$this->id = $id;
		$this->saveField('type', $value);
	}

	public function getUsers()
	{
		$conditions = array("Teacher.type" => "P");
		$query = $this->find('all', array('conditions' => $conditions));

		return($this->associateSchoolNames($query));
	}

	public function userList($user)
	{
		$query = $this->find('all',array('conditions' => array('NOT' => array('Teacher.id' => $user['Teacher']['id']))));

		return($this->associateSchoolNames($query));
	}

	public function associateSchoolNames($Userlist)
	{
		$justschoolNames = $this->School->find('list', array(
				'fields' => array('School.school_Name')));

		for($i=0; $i<count($Userlist); $i++)
		{
			$Userlist[$i]['Teacher']['school'] = $justschoolNames[$Userlist[$i]['Teacher']['school']];
		}

		return $Userlist;
	}

	public function getUserDetails($id)
	{
		$query = $this->find('all',array('conditions' => array('Teacher.id' => $id)));
		return($query[0]);
	}

	public function saveModification($fields)
	{
		$fields['Teacher']['password'] = Security::hash($fields['Teacher']['password']);

		if($this->save($fields))
			return true;
		else
			return false;
	}
	
	public function userResetPassword($id)
	{
		$this->id = $id;
		$this->saveField('password', Security::hash("CAPLTER"));
		return true;
	}
}
