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

	//Method to check if the given email address and password exists in the database.
	public function validateLogin($emailAddress = null,$password = null)
	{
		$password = Security::hash($password);
		$user = $this->findByemailAddressAndPassword($emailAddress,$password);
		if($user)
		{
			if('P' != $user['Teacher']['type'])
			{
				return $user;
			}
			else
				return false;
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
		pr(Security::hash($fields['Teacher']['password']));
		$fields['Teacher']['password'] = Security::hash($fields['Teacher']['password']);
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
		return $query;
	}
}
