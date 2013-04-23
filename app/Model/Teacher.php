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
			'school_id' => array(
					'rule' => 'notEmpty')
	);

	public $belongsTo = array(
			'School' => array(
					'className' => 'School',
					'foreignKey'   => 'school_id',
			),
	);

	public $hasMany = array(
			'TeachersClass' => array(
					'className' => 'TeachersClass',
			));
	public $recursive = -1;



	//Method to check if the given email address and password exists in the database.
	public function validateLogin($emailAddress = null,$password = null)
	{
		$password1 = Security::hash($password);
		$fields = array('Teacher.id','Teacher.email_address','Teacher.type','Teacher.name','Teacher.school_id','Teacher.password');
		$conditions = array("Teacher.email_address" => $emailAddress,"Teacher.password" => $password1,);
		$user = $this->find('first',array('conditions' => $conditions,'fields'=>$fields));
		
		if($user)
		{
			if('P' != $user['Teacher']['type'])
			{
				$this->id = $user['Teacher']['id'];
				$this->saveField('last_login', date('Y-m-d H:i:s'));
				return $user;
			}
			else
				return "pending";
		}
		else
			return false;

	}

	//Method to check if the email address already exists in the database.
	public function checkEmailAddressExists($fields = null)
	{
		if($fields == null)
			return false;

		if($this->findByEmailAddress($fields) != null)
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
		if($fields == null)
			return false;
		$this->create();
		$fields['Teacher']['password'] = Security::hash($fields['Teacher']['password']);
		$fields['Teacher']['date_created'] = date('Y-m-d H:i:s');


		if($this->save($fields))
			return true;
		else
			return false;
	}

	//Change the type of the user from P (pending) to T(teacher)
	public function approveUser($id,$value)
	{

		if($id == null || $value == null)
			return false;
		$temp['id'] = $id;
		if($this->hasAny($temp))
		{
			$this->id = $id;
			$this->saveField('type', 'T');
			return true;
		}
		return false;
	}

	//List of all the users who have type as pending. This is used to populate the approve users page
	public function getUsers()
	{
		$conditions = array("Teacher.type" => "P");
		$query = $this->find('all', array('conditions' => $conditions));
		return($this->associateSchoolNames($query));
	}

	//This data is used to populate the modify users page.
	public function userList($user)
	{
		if($user == null)
			return null;
		$query = $this->find('all',array('conditions' => array('NOT' => array('Teacher.id' => $user['Teacher']['id']))));
		return($this->associateSchoolNames($query));
	}


	public function associateSchoolNames($Userlist)
	{

		if($Userlist == null)
		{
			return false;
		}

		$justschoolNames = $this->School->find('list', array(
				'fields' => array('School.school_Name')));

		for($i=0; $i<count($Userlist); $i++)
		{
			$Userlist[$i]['Teacher']['school_id'] = $justschoolNames[$Userlist[$i]['Teacher']['school_id']];
		}

		return $Userlist;
	}

	//
	public function getUserDetails($id)
	{
		$query = $this->find('all',array('conditions' => array('Teacher.id' => $id)));
		return($query[0]);
	}

	public function saveModification($fields)
	{
		if($fields == null)
			return false;
		$fields['Teacher']['password'] = Security::hash($fields['Teacher']['password']);

		if($this->save($fields,$validate = true))
			return true;
	}

	public function userResetPassword($id)
	{
		if($id ==null)
			return false;
		$temp['id'] = $id;
		if($this->hasAny($temp))
		{
			$this->id = $id;
			if($this->saveField('password', Security::hash("CAPLTER")))
				return true;
		}
		else
			return false;
	}

	public function getSiteIDs($user)
	{
		if($user == null)
			return false;

		$site = ClassRegistry::init('Site')->getTeachersSites($user['Teacher']['school_id']);
		return $site;
	}

	public function getClassIDs($user)
	{
		if($user == null)
			return false;

		$class =  ClassRegistry::init('TeachersClass')->getClassIDs($user['Teacher']['school_id'],$user['Teacher']['id']);
		return $class;
	}

	//Deleting a teacher is to first delete any teachers class he has created before deleting the teacher himself.
	//This resolves the foreign key constraint.
	public function deleteTeacher($id)
	{
		if($id ==null)
			return false;

		$temp['id'] = $id;

		if($this->hasAny($temp))
		{
			$query = ClassRegistry::init('TeachersClass')->find('all',array('conditions' => array('TeachersClass.teacher_id' => $id)));
			if($query != null)
			{
				foreach($query as $class)
				{
					$status = ClassRegistry::init('TeachersClass')->delete($class['TeachersClass']['id']);
					if($status != true)
						return false;
				}
				if($this->delete($id))
					return true;
			}
			if($this->delete($id))
				return true;
		}
		else
			return false;
	}
}
