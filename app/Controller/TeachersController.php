<?php
App::uses('AppController', 'Controller');
App::uses('Utitlity','Security');

/**
 * Teachers Controller
 *
 * @property Teacher $Teacher
*/
class TeachersController extends AppController {
	public $helpers = array('Html', 'Form');
	/**
	 * index method
	 *
	 * @return void
	*/
	public function index()
	{
		$this->Teacher->recursive = 0;
		$this->set('teachers', $this->paginate());
	}


	//Method to validate the user credentials before login.
	public function login($fields = null)
	{
		if($this->Session->check('User'))
		{
			$this->Session->setFlash('You have already logged in. Please logout.');
			$this->redirect(array(
					'action' => 'index'));

		}

		if ($this->request->is('post'))
		{

			$user = $this->Teacher->validateLogin($this->request->data['Teacher']['email_address'],$this->request->data['Teacher']['password']);
			if ($user)
			{
				if("pending" == $user)
				{
					$this->Session->setFlash('Your account is not yet approved. You will receive a mail once its approved.');
				}
				else
				{
					//Writing the user information into the session variable and redirecting to the home page.
					$this->Session->setFlash('Login Successful');
					$this->Session->write('User', $user);
					$this->Session->write('UserType',$user['Teacher']['type']);
					$this->redirect(array(
							'action' => 'index'));
				}
			}
			else
			{
				$this->Session->setFlash('Unable to login. Please check your email address and password that was entered');
			}
		}
	}

	//Method to logout the user.
	public function logout()
	{
		if($this->Session->check('User'))
		{
			$this->Session->destroy();
			$this->Session->setFlash('You have been logged out!');
			$this->redirect(array(
					'action' => 'index'));
			exit();
		}
	}

	//Method that redirects to the home page of the techer model.
	public function back()
	{
		$this->redirect(array('action' => 'index'));
	}

	//Method to register a new teacher into the system.
	public function register()
	{
		//Loading the school model so that the school dropdown can be populated.
		$this->loadModel('School');
		$school = $this->School->loadSchools();
		$this->set('schools', $school);

		if ($this->request->is('post'))
		{
			//$this->Teacher->create();

			//Check to see if the email address already exists in the database.
			if($this->Teacher->checkEmailAddressExists($this->request->data['Teacher']['email_address']))
			{
				$this->Session->setFlash('Email Address already exists. Please try a different one.');
			}
			else
			{
				//If the above validation, along with the model validation is satisfied, create the user profile.

				if ($this->Teacher->createUser($this->request->data))
				{
					$this->Session->setFlash(__('You can enter your data once your profile is approved. Until then check our existing data.'));

					//After registering, the user is redirected to the main page.
					$this->redirect(array(
							'action' => 'index'));
				}
				else
				{
					//Errors that has to be fixed before creating user profile.
					$this->Session->setFlash(__('Unable to create profile. Please try again after correcting the errors shown below.'));
				}
			}
		}
	}

	public function approveUser()
	{
		if($this->authorizedUser())
		{
			$query = $this->Teacher->getUsers();
			$this->set('teachersYetToBeApproved', $query);

			if ($this->request->is('post'))
			{
				$temp['value'] = $this->request->data['Approve'];

				for($i=0; $i<count($query); $i++)
				{
					if(1 == $temp['value'][$query[$i]['Teacher']['id']])
						$this->Teacher->approveUser($query[$i]['Teacher']['id'], 'T');
				}

				$this->set('teachersYetToBeApproved', $this->Teacher->getUsers());
			}
		}
	}

	public function authorizedUser()
	{
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
			return false;
		}
		else
			return true;
	}

	public function modifyUser()
	{
		if($this->authorizedUser())
		{
			$userList = $this->Teacher->userList($this->Session->read('User'));
			$this->set('userList', $userList);
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Teacher'));
		}

		$teacher = $this->Teacher->getUserDetails($id);

		if (!$teacher) {
			throw new NotFoundException(__('Invalid Teacher'));
		}

		$this->loadModel('School');
		$school = $this->School->loadSchools();

		for($i = 1; $i <= count($school); $i++)
		{
			$schooloptions[$i]['name'] = $school[$i];
			$schooloptions[$i]['value'] = $i;
		}

		$userTypeOptions = array(array('name' => 'Teacher','value' => 'T'),array('name' => 'Admin','value' => 'A'),array('name' => 'Pending','value' => 'P'),);

		$this->set('schooloptions', $schooloptions);
		$this->set('userTypeOptions', $userTypeOptions);

		if ($this->request->is('post') || $this->request->is('put'))
		{
			if($this->authorizedUser())
			{
				$this->Teacher->id = $id;

				if ($this->Teacher->saveModification($this->request->data))
				{
					$this->Session->setFlash('Teachers detail has been updated.');
					$this->redirect(array('action' => 'modifyUser'));
				}
				else
				{
					$this->Session->setFlash('Unable to update your teachers detail.');
				}
			}
		}

		if (!$this->request->data)
		{
			$this->request->data = $teacher;
		}
	}

	public function delete($id,$name)
	{

		if($this->authorizedUser())
		{
			if ($this->request->is('get'))
			{
				throw new MethodNotAllowedException();
			}

			if ($this->Teacher->delete($id))
			{
				$this->Session->setFlash($name .' has been deleted.');
				$this->redirect(array('action' => 'modifyUser'));
			}
		}
	}
	
	public function userResetPassword($id,$name)
	{
		
		if($this->authorizedUser())
		{
			
			if ($this->request->is('get'))
			{
				throw new MethodNotAllowedException();
			}
			
			if ($this->Teacher->userResetPassword($id))
			{
				$this->Session->setFlash($name .'\'s password has been reset to "CAPLTER".');
				$this->redirect(array('action' => 'modifyUser'));
			}
		}
		
	}
}
