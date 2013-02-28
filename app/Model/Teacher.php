<?php
App::uses('AppModel', 'Model');
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
			'username' => array(
					'notempty' => array(
							'rule' => array('notempty'),
					),
			),
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
	
	//Method to check if the given username and password exists in the database.
	public function validateLogin($username = null,$password = null)
	{
		return ($this->findByUsernameAndPassword($username,$password));
	}
	
	//Method to check if the username already exists in the database.
	public function checkUsernameExists($fields = null)
	{
		if($this->findByUsername($fields) != null)
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
		$conditions = array("Teacher.type" => "-");
		$query = $this->find('all', array('conditions' => $conditions));
		return $query;
	}
}
